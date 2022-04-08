<?php

namespace App\Controller;

use App\Entity\Postuler;
use App\Form\PostulerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostulerController extends AbstractController
{
    #[Route('/postuler', name: 'app_postuler')]
    public function new(Request $request): Response
    {
    $postuler = new Postuler();
    $form = $this->createForm(PostulerType::class, $postuler);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('app_home');
        }
        return $this->render('postuler/index.html.twig', [
            'controller_name' => 'PostulerController',
            'title' => 'Postuler pour EcoIT',
        ]);
    }
}
