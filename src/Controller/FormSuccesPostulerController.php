<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormSuccesPostulerController extends AbstractController
{
    #[Route('/formsuccespostuler', name: 'app_form_succes_postuler')]
    public function index(): Response
    {
        return $this->render('form_succes_postuler/formsucces.html.twig', [
            'title' => 'Mise en ligne Formation - Eco IT',
            ]);
    }
}
