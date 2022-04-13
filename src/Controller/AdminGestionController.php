<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminGestionController extends AbstractController
{


    #[Route('/admin', name: 'app_admin_gestion')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();


        $count = $doctrine->getRepository(User::class)->countUser();
        $countteatcher = $doctrine->getRepository(User::class)->countTeatcher();

        $validteatcher = $doctrine->getRepository(User::class)->findBy([
            'roles' => '[\"ROLE_TEATCHER\"]',
        ]);

        return $this->render('gestion/admin.html.twig', [
            'title' => 'Page gestion admin EcoIT',
            'user' => $user,
            'count' => $count,
            'countteatcher' => $countteatcher[0][1],
            'validteatcher' => $validteatcher,
        ]);
    }

}

/**
 * Require ROLE_SUPER_ADMIN only for this action
 *
 * @IsGranted("ROLE_SUPER_ADMIN")
 */

