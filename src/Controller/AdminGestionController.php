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


    #[Route('/admin', name: 'app_admin')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();

        $count = $doctrine->getRepository(User::class)->countUser();
        $countteatcher = $doctrine->getRepository(User::class)->countTeatcher();

        $novalidteatcher = $doctrine->getRepository(User::class)->noValidTeatcher();
        $teatchervalide = $doctrine->getRepository(User::class)->validateTeatcher();

        $valider = $user->setValidate(1);


        return $this->render('gestion/admin.html.twig', [
            'title' => 'Page gestion admin EcoIT',
            'user' => $user,
            'count' => $count,
            'countteatcher'  => $countteatcher[0][1],
            'novalidteatcher'  => $novalidteatcher,
            'teatchervalide' => $teatchervalide,
            'valider' => $valider,

        ]);
    }
}


/**
 * Require ROLE_SUPER_ADMIN only for this action
 *
 * @IsGranted("ROLE_SUPER_ADMIN")
 */

