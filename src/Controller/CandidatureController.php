<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Candidature;
use App\Entity\OffreEmploi;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatureController extends AbstractController
{
    #[Route('/candidature/{id}', name: 'app_candidature')]
    public function candidature(OffreEmploi $offreEmploi, EntityManagerInterface $entityManager): Response
    {
        /**
         * @var User $user
         */
        $user = $this->getUser();
        $candidat = $user->getCandidat();

        $candidature = new Candidature;
        $candidature->setCandidat($candidat);
        $candidature->setOffreEmploi($offreEmploi);

        $entityManager->persist($candidature);
        $entityManager->flush();

        //créer nouvelle candidature et lui set le candidat et l'offre dans la bdd

        return $this->redirectToRoute('app_home');

    }
}
