<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;
class UserGestionController extends AbstractController
{
    #[Route('/usergestion', name: 'app_user_gestion')]
    public function index(): Response
    {

        return $this->render('gestion/usergestion.html.twig', [
            'title' => 'Page de gestion Utilisateur'
            ]);
    }
}