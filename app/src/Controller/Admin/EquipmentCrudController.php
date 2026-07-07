<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Equipment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

/**
 * @extends AbstractCrudController<Equipment>
 */
#[IsGranted('ROLE_ADMIN')]
class EquipmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipment::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Equipment')
            ->setEntityLabelInPlural('Equipment')
            ->setDefaultSort(['name' => 'ASC'])
            ->setSearchFields(['name']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('name', 'Name');
        yield TextareaField::new('description')->setRequired(false);
        yield TextField::new('icon', 'Icon')
            ->setHelp('Font Awesome class name, e.g. "fa-solid fa-wifi".')
            ->setRequired(false);
        yield AssociationField::new('rooms', 'Rooms')->autocomplete();
        yield DateTimeField::new('createdAt', 'Created at')->hideOnForm();
        yield DateTimeField::new('updatedAt', 'Updated at')->hideOnForm();
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters->add(TextFilter::new('name'));
    }
}
