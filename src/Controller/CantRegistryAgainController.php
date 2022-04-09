<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CantRegistryAgainController extends AbstractController
{
    #[Route('/cantregistry', name: 'app_cant_registry_again')]
    public function index(): Response
    {
        return $this->render('security/cantregistry.html.twig', [
            'controller_name' => 'CantRegistryAgainController',
        ]);
    }
}
