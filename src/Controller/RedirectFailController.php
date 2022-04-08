<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedirectFailController extends AbstractController
{
    #[Route('/redirect', name: 'app_redirect_fail')]
    public function index(): Response
    {
        return $this->render('bundles/TwigBundle/Exception/error403.html.twig', [
            'title' => 'Accés Interdit',
        ]);
    }
}
