<?php

declare(strict_types=1);

namespace App\Controller\Host;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class DashboardController extends AbstractController
{
    #[Route(
        path: '/host',
        name: 'app_host_dashboard'
    )]
    public function index(): Response
    {
        return $this->render('host/dashboard.html.twig');
    }
}