<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminGestionController extends AbstractController
{
    /**
     * Require ROLE_SUPER_ADMIN only for this action
     *
     * @IsGranted("ROLE_SUPER_ADMIN")
     */

    #[Route('/admin', name: 'app_admin_gestion')]
    public function index(): Response
    {
        return $this->render('security/admin.html.twig', [
            'controller_name' => 'AdminGestionController',

        ]);
    }
}
