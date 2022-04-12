<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzUserController extends AbstractController
{
    #[Route('/quizzuser', name: 'app_quizz_user')]
    public function index(): Response
    {
        return $this->render('formation/quizzuser.html.twig', [
        ]);
    }
}
