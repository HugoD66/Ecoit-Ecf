<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CantPostulerController extends AbstractController
{
    #[Route('/cantpostuler', name: 'app_cant_postuler')]
    public function index(): Response
    {
        return $this->render('security/cantpostuler.html.twig', [
            'title' => 'Postulation Impossible - Eco IT',
        ]);
    }
}
