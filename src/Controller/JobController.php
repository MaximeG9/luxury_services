<?php

namespace App\Controller;

use App\Entity\OffreEmploi;
use App\Repository\OffreEmploiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    #[Route('/job', name: 'app_job')]
    public function job(OffreEmploiRepository $offreEmploiRepository): Response
    {

        $offresEmplois = $offreEmploiRepository->findAll();
        return $this->render('job/job.html.twig', [
            'offresEmplois' => $offresEmplois
        ]);
    }

    #[Route('/job/details/{id}', name: 'app_job_details')]
    public function jobDetails(OffreEmploiRepository $offreEmploiRepository, int $id): Response
    {

        $offreEmploi = $offreEmploiRepository->findOneBy([
            'id' => $id,
        ]);
        // dd($offreEmploi);
        return $this->render('job/job-details.html.twig', [
            'offreEmploi' => $offreEmploi
        ]);
    }
}
