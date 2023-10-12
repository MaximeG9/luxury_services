<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\User;
use App\Form\CandidatType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class CandidatController extends AbstractController
{
    #[Route('/candidat', name: 'app_candidat')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        
        if(!$this->getUser()){
            return $this->redirectToRoute('app_login');
        }

        /**
         * @var User $user
         */

        $user = $this->getUser();
        $candidat = $user->getCandidat();


        $formCandidat = $this->createForm(CandidatType::class, $candidat);
        $formCandidat->handleRequest($request);

        // PHOTO PROFIL

        if ($formCandidat->isSubmitted() && $formCandidat->isValid()) {

            

            if($formCandidat['photoProfil']->getData()){
                /**
                 * @var UploadedFile $profilePictureFile
                 */
                $profilePictureFile = $formCandidat['photoProfil']->getData();

                $profilePictureName = Uuid::v7();

                

                $extension = $profilePictureFile->guessExtension();
                if(!$extension) {
                    $extension = 'png';
                }
                $profilePictureName = $profilePictureName.'.'.$extension; 

        

                $profilePictureFile->move('medias/profilePictures', $profilePictureName);

                $profilePictureMedia = new Media();

                $profilePictureMedia->setUrl($profilePictureName);
                $profilePictureMedia->setOriginalName($profilePictureFile->getClientOriginalName());

                $entityManager->persist($profilePictureMedia);

                $candidat->setPhotoProfil($profilePictureMedia);

            }

            // CV

            if($formCandidat['cv']->getData()){
                /**
                 * @var UploadedFile $cvFile
                 */
                $cvFile = $formCandidat['cv']->getData();

                $cvName = Uuid::v7();

                

                $extension = $cvFile->guessExtension();
                if(!$extension) {
                    $extension = 'png';
                }
                $cvName = $cvName.'.'.$extension; 

        

                $cvFile->move('medias/cv', $cvName);

                $cvMedia = new Media();

                $cvMedia->setUrl($cvName);
                $cvMedia->setOriginalName($cvFile->getClientOriginalName());

                $entityManager->persist($cvMedia);

                $candidat->setCv($cvMedia);

            }

            // PASSEPORT

            if($formCandidat['passeportFichier']->getData()){
                /**
                 * @var UploadedFile $cvFile
                 */
                $passportFile = $formCandidat['passeportFichier']->getData();

                $passportName = Uuid::v7();

                

                $extension = $passportFile->guessExtension();
                if(!$extension) {
                    $extension = 'png';
                }
                $passportName = $passportName.'.'.$extension; 

        

                $passportFile->move('medias/passeports', $passportName);

                $passportMedia = new Media();

                $passportMedia->setUrl($passportName);
                $passportMedia->setOriginalName($passportFile->getClientOriginalName());

                $entityManager->persist($passportMedia);

                $candidat->setPasseportFichier($passportMedia);

            }


            $entityManager->persist($candidat);
            $entityManager->flush();
        }

        return $this->render('candidat/candidat.html.twig', [
            'candidat' => $candidat,
            'formCandidat' => $formCandidat,
        ]);
    }
}
