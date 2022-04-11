<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostulerSuccesController extends AbstractController
{
    #[Route('/postulersucces', name: 'app_postuler_succes')]
    public function index(): Response
    {
        return $this->render('security/postulersucces.html.twig', [
            'title' => 'Bravo! Vous avez postulé!'
        ]);
    }
}
