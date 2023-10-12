<?php

namespace App\Controller\Admin;

use App\Entity\OffreEmploi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OffreEmploiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OffreEmploi::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('reference'),
            AssociationField::new('client'),
            TextareaField::new('description'),
            BooleanField::new('activation'),
            TextField::new('titreOffre'),
            TextField::new('location'),
            IntegerField::new('salaire'),
            DateTimeField::new('dateCreation'),
            AssociationField::new('jobCategorie'),
            AssociationField::new('typeOffre'),
        ];
    }
}
