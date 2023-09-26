<?php

namespace App\Controller\Admin;

use App\Entity\Allergy;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AllergyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Allergy::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Allergie')
            ->setEntityLabelInPlural('Allergies')
            ->setPageTitle(pageName:Crud::PAGE_INDEX, title: 'Alllergie')
            ->setPageTitle(pageName:Crud::PAGE_NEW, title: 'Ajouter une allergie')
            ->setPageTitle(pageName:Crud::PAGE_EDIT, title: 'Modifier une allergie')
            ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),  
            TextField::new('name')
            ->setLabel('Nom')
        ];
    }
    
}
