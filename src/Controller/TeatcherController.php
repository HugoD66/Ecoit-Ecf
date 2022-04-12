<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeatcherController extends AbstractController
{
    #[Route('/teatcher', name: 'app_teatcher')]
    public function index(): Response
    {
        return $this->render('gestion/teatcher.html.twig', [
            'controller_name' => 'TeatcherController',
        ]);
    }
}
