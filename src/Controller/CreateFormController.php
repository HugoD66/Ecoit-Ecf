<?php


namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\File\File;

class CreateFormController extends AbstractController
{
    #[Route('/createform', name: 'app_createform')]
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $formation = new Formation();

        $form = $this->createForm(FormationType::class, $formation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {



            $teatcherFile = $form->get('media')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($teatcherFile) {
                $originalFilename = pathinfo($teatcherFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $teatcherFile->guessExtension();

                // Move the file to the directory where picture are stored
                try {
                    $teatcherFile->move(
                        $this->getParameter('teatcher-directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }





                return $this->redirectToRoute('app_home');
            }

        }
        return $this->render('formation/createform.html.twig', [
            'form' => $form->createView(),
            'title' => 'Creation de Formation Eco IT',
        ]);
    }
}


