<?php

namespace App\Controller\Admin;

use App\Entity\Candidat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CandidatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidat::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('genre')->setChoices([
                'Homme'=>'homme',
                'Femme'=>'femme',
            ]),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('nationalite'),
            BooleanField::new('isPasseport'),
            DateTimeField::new('dateNaissance'),
            TextField::new('lieuNaissance'),
            BooleanField::new('disponibilte'),
            TextField::new('experience'),
            TextEditorField::new('description'),
            TextField::new('note'),
            DateTimeField::new('dateCreation'),
            DateTimeField::new('dateSuppression'),
            TextField::new('adresse'),
            TextField::new('pays'),
            AssociationField::new('user'),
            AssociationField::new('jobCategorie'),
        ];
    }
}
