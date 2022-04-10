<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateFormController extends AbstractController
{
    #[Route('/createform', name: 'app_createform')]
    public function index(): Response
    {
        return $this->render('formation/createForm.html.twig', [
            'title' => 'Creation de Formation EcoIT'
        ]);
    }
}
