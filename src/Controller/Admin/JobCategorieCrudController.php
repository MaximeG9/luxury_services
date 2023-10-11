<?php

namespace App\Controller\Admin;

use App\Entity\JobCategorie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobCategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return JobCategorie::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
