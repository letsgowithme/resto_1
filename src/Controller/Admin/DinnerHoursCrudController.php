<?php

namespace App\Controller\Admin;

use App\Entity\DinnerHours;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DinnerHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DinnerHours::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Heure du soir')
            ->setEntityLabelInPlural('Heures du soir')
            ->setPageTitle(pageName:Crud::PAGE_INDEX, title: 'Heure du soir')
            ->setPageTitle(pageName:Crud::PAGE_NEW, title: 'Ajouter une Heure du soir')
            ->setPageTitle(pageName:Crud::PAGE_EDIT, title: 'Modifier une Heure du soir')
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
