<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Room;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Filter\NumericFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

/**
 * @extends AbstractCrudController<Room>
 */
#[IsGranted('ROLE_ADMIN')]
class RoomCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Room::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Room')
            ->setEntityLabelInPlural('Rooms')
            ->setDefaultSort(['createdAt' => 'DESC'])
            ->setSearchFields(['name', 'city', 'address', 'postal_code']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('name', 'Name');
        yield TextareaField::new('description');
        yield IntegerField::new('capacity', 'Capacity');
        yield MoneyField::new('hourlyPrice', 'Hourly price')
            ->setCurrency('EUR')
            ->setStoredAsCents(false)
            ->setNumDecimals(0);
        yield TextField::new('address', 'Address')->setRequired(false);
        yield TextField::new('city', 'City')->setRequired(false);
        yield TextField::new('postalCode', 'Postal code')->setRequired(false);
        yield AssociationField::new('equipments', 'Equipment')->autocomplete();
        yield DateTimeField::new('createdAt', 'Created at')->hideOnForm();
        yield DateTimeField::new('updatedAt', 'Updated at')->hideOnForm();
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('city'))
            ->add(NumericFilter::new('capacity'))
            ->add(EntityFilter::new('equipments'));
    }
}
