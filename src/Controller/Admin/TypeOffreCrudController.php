<?php

namespace App\Controller\Admin;

use App\Entity\TypeOffre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypeOffreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeOffre::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('type'),
        ];
    }
}
