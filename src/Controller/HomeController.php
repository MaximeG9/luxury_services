<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\OffreEmploiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OffreEmploiRepository $offreEmploiRepository): Response
    {

        /**
         * @var User $user
         */

         $user = $this->getUser();

        $offresEmplois = $offreEmploiRepository->findAll();
        return $this->render('home/index.html.twig', [
           'offresEmplois' => $offresEmplois,
           'user' => $user,
        ]);
    }
}
