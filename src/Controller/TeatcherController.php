<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeatcherController extends AbstractController
{
    #[Route('/teatcher', name: 'app_teatcher_gestion')]
    public function index(): Response
    {
        $user = $this->getUser();


        return $this->render('gestion/teatcher.html.twig', [
            'title' => 'Page gestion professeur EcoIT',
            'user' => $user,

        ]);
    }
}
