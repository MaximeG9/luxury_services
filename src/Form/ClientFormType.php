<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('genre')
            ->add('nom')
            ->add('prenom')
            ->add('nationalite')
            ->add('isPasseport')
            ->add('dateNaissance')
            ->add('lieuNaissance')
            ->add('disponibilte')
            ->add('jobCategorie')
            ->add('experience')
            ->add('description')
            ->add('note')
            ->add('dateCreation')
            ->add('dateSuppression')
            ->add('adresse')
            ->add('pays')
            ->add('user')
            ->add('cv')
            ->add('photoProfil')
            ->add('passeportFichier')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
