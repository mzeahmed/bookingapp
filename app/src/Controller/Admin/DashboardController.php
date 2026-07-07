<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\RoomsRepository;
use App\Repository\EquipmentRepository;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly RoomsRepository $roomsRepository,
        private readonly EquipmentRepository $equipmentRepository,
        private readonly AdminUrlGenerator $adminUrlGenerator,
    ) {
    }

    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig', [
            'usersCount' => $this->userRepository->count([]),
            'roomsCount' => $this->roomsRepository->count([]),
            'equipmentCount' => $this->equipmentRepository->count([]),
            'latestUsers' => $this->userRepository->findLatest(5),
            'latestRooms' => $this->roomsRepository->findLatest(5),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bookingapp Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Users');
        yield MenuItem::linkTo(UserCrudController::class, 'Users list', 'fa fa-users');

        yield MenuItem::section('Accommodations');
        yield MenuItem::linkTo(RoomCrudController::class, 'Rooms', 'fa fa-bed');
        yield MenuItem::linkTo(EquipmentCrudController::class, 'Equipment', 'fa fa-plug');

        yield MenuItem::section('Settings');
        $currentUser = $this->getUser();
        if ($currentUser instanceof User && null !== $currentUser->getId()) {
            yield MenuItem::linkToUrl(
                'My profile',
                'fa fa-id-card',
                $this->adminUrlGenerator
                    ->setController(UserCrudController::class)
                    ->setAction(Action::EDIT)
                    ->setEntityId($currentUser->getId())
                    ->generateUrl()
            );
        }
    }
}
