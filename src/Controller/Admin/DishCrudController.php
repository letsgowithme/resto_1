<?php

namespace App\Controller\Admin;

use App\Entity\Dish;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class DishCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dish::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ->setEntityLabelInSingular('Plat')
            ->setEntityLabelInPlural('Plats')
            ->setPageTitle(pageName: Crud::PAGE_INDEX, title: 'Plats')
            ->setPageTitle(pageName: Crud::PAGE_NEW, title: 'Créer un plat')
            ->setPageTitle(pageName: Crud::PAGE_EDIT, title: 'Modifier le plat');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('title')
                ->setLabel('Titre'),
            TextEditorField::new('description')
                ->setFormType(CKEditorType::class)
                ->hideOnIndex()
                ->setLabel('Déscription'),
            // AssociationField::new('category')
            //     ->setLabel('Catégorie'),
        ];
    }
}
