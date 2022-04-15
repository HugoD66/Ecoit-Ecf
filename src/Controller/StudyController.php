<?php

namespace App\Controller;

use App\Entity\Study;
use App\Form\FormationType;
use App\Form\StudyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudyController extends AbstractController
{
    #[Route('/study', name: 'app_study')]
    public function new(Request $request): Response
    {
        $study = new Study();
        $title = $this->getTitle();

        $form = $this->createForm(StudyType::class, $study, array(
            'title' => $title,
        ));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $study = $form->getData();

            return $this->redirectToRoute('task_success');



        }
        return $this->render('formation/study.html.twig', [
            'title'=>'Cour Eco-IT',
            'form' => $form->createView(),

        ]);
    }
}
