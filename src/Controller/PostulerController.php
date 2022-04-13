<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormType;
use App\Form\PostulerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostulerController extends AbstractController
{
    #[Route('/postuler', name: 'app_postuler')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $user = new User();
        $form = $this->createForm(FormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('postulerSucces');
        }


        return $this->render('security/postuler.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
