<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminGestionController extends AbstractController
{

    #[Route('/admin', name: 'app_admin_gestion')]
    public function index(): Response
    {
        return $this->render('security/admin.html.twig', [
            'controller_name' => 'AdminGestionController',
            'title' => 'Page gestion admin EcoIT',

        ]);
    }
}
