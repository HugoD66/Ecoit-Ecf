<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserGestionController extends AbstractController
{
    #[Route('/usergestion', name: 'app_user_gestion')]
    public function index(): Response
    {
        return $this->render('gestion/usergestion.html.twig', [
        ]);
    }
}
