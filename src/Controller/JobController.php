<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\OffreEmploiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    #[Route('/job', name: 'app_job')]
    public function job(OffreEmploiRepository $offreEmploiRepository): Response
    {

         /**
         * @var User $user
         */

         $user = $this->getUser();

        $offresEmplois = $offreEmploiRepository->findAll();
        return $this->render('job/job.html.twig', [
            'offresEmplois' => $offresEmplois,
            'user' => $user,
        ]);

       
    }

    #[Route('/job/details/{id}', name: 'app_job_details')]
    public function jobDetails(OffreEmploiRepository $offreEmploiRepository, int $id): Response
    {

         /**
         * @var User $user
         */

         $user = $this->getUser();

        $offreEmploi = $offreEmploiRepository->findOneBy([
            'id' => $id,
        ]);

        //boutton next debut
        // Verif si le Jo est le dernier 
        $maxOffreEmploiId = $offreEmploiRepository->createQueryBuilder('jo')
            ->select('MAX(jo.id)')
            ->getQuery()
            ->getSingleScalarResult();

        if ($id == $maxOffreEmploiId) {
            //  check si on est au dernier et si oui reste sur la meme page 
            $nextOffreEmploi = $offreEmploi;
        } else {
            // sinon recup le prochain
            $nextOffreEmploi = $offreEmploiRepository->createQueryBuilder('jo')
                ->where('jo.id > :id')
                ->setParameter('id', $id)
                ->orderBy('jo.id', 'ASC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        }
        //boutton next fin


        //boutton previous debut
        // Verif si le Jo est le premier 
        $minOffreEmploiId = $offreEmploiRepository->createQueryBuilder('jo')
            ->select('MIN(jo.id)')
            ->getQuery()
            ->getSingleScalarResult();

        if ($id == $minOffreEmploiId) {
            //  check si on est au premier et si oui reste sur la meme page 
            $previousOffreEmploi = $offreEmploi;
        } else {
            // sinon recup le précédent
            $previousOffreEmploi = $offreEmploiRepository->createQueryBuilder('jo')
                ->where('jo.id < :id')
                ->setParameter('id', $id)
                ->orderBy('jo.id', 'ASC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        }
        //boutton previous fin


        // dd($offreEmploi);
        return $this->render('job/job-details.html.twig', [
            'offreEmploi' => $offreEmploi,
            'nextOffreEmploi' => $nextOffreEmploi,
            'previousOffreEmploi' => $previousOffreEmploi,
            'user' => $user,
        ]); 
    }
}
