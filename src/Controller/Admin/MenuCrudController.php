<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class MenuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menu::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                 ->hideOnForm(),  
            TextField::new('title')
                    ->setLabel('Nom'),
            TextEditorField::new('conditions')
                ->setFormType(CKEditorType::class)
                ->setLabel('Conditions')
                ->hideOnIndex()
               ,
            TextEditorField::new('description')
                ->setFormType(CKEditorType::class)
                ->hideOnIndex()
                ->setLabel('Déscription'),
            NumberField::new('price')
                ->setLabel('Prix'),

        ];
    }
    
}
