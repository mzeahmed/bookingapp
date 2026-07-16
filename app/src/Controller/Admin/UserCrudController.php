<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\User;
use App\Password\PasswordUpdater;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Filter\DateTimeFilter;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

/**
 * @extends AbstractCrudController<User>
 */
#[IsGranted('ROLE_ADMIN')]
class UserCrudController extends AbstractCrudController
{
    public function __construct(
        private readonly PasswordUpdater $passwordUpdater,
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('User')
            ->setEntityLabelInPlural('Users')
            ->setDefaultSort(['createdAt' => 'DESC'])
            ->setSearchFields(['email', 'firstName', 'lastName']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield EmailField::new('email');
        yield TextField::new('firstName', 'First name')->setRequired(false);
        yield TextField::new('lastName', 'Last name')->setRequired(false);

        yield ChoiceField::new('roles', 'Roles')
            ->setChoices([
                'User' => 'ROLE_USER',
                'Administrator' => 'ROLE_ADMIN',
            ])
            ->allowMultipleChoices()
            ->renderExpanded()
            ->onlyOnForms();
        yield ArrayField::new('roles', 'Roles')->onlyOnIndex();

        yield TextField::new('plainPassword', 'Password')
            ->setFormType(PasswordType::class)
            ->setRequired(Crud::PAGE_NEW === $pageName)
            ->setHelp(Crud::PAGE_NEW === $pageName
                ? 'Password required on creation.'
                : 'Leave empty to keep the current password.')
            ->onlyOnForms();

        yield BooleanField::new('isVerified', 'Verified')->renderAsSwitch();

        yield DateTimeField::new('createdAt', 'Created at')->hideOnForm();
        yield DateTimeField::new('updatedAt', 'Updated at')->hideOnForm();
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('email'))
            ->add(ChoiceFilter::new('roles')->setChoices([
                'User' => 'ROLE_USER',
                'Administrator' => 'ROLE_ADMIN',
            ]))
            ->add(DateTimeFilter::new('createdAt'));
    }

    public function persistEntity(EntityManagerInterface $entityManager, object $entityInstance): void
    {
        $plainPassword = $entityInstance->getPlainPassword();

        if (null !== $plainPassword && '' !== $plainPassword) {
            ($this->passwordUpdater)($entityInstance, $plainPassword);

            return;
        }

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, object $entityInstance): void
    {
        $plainPassword = $entityInstance->getPlainPassword();

        if (null !== $plainPassword && '' !== $plainPassword) {
            ($this->passwordUpdater)($entityInstance, $plainPassword);

            return;
        }

        parent::updateEntity($entityManager, $entityInstance);
    }
}
