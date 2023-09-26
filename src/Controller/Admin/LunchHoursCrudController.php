<?php

namespace App\Controller\Admin;

use App\Entity\LunchHours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LunchHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LunchHours::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
