<?php

namespace App\Controller\Admin;

use App\Entity\LunchHours;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LunchHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LunchHours::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Heure du midi')
            ->setEntityLabelInPlural('Heures du midi')
            ->setPageTitle(pageName:Crud::PAGE_INDEX, title: 'Heure du midi')
            ->setPageTitle(pageName:Crud::PAGE_NEW, title: 'Ajouter une Heure du midi')
            ->setPageTitle(pageName:Crud::PAGE_EDIT, title: 'Modifier une Heure du midi')
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),  
            TextField::new('hour')
            ->setLabel('Heure'),
           
        ];
    }
}
