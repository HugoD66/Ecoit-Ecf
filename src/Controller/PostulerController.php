<?php

namespace App\Controller;

use App\Entity\User;
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
        $user = new User();
        $form = $this->createForm(PostulerType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            return $this->redirectToRoute('postulerSucces');
        }


        return $this->render('security/postuler.html.twig', [
            'form' => $form,
        ]);
    }
}
