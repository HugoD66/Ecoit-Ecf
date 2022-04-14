<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
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

        return $this->render('gestion/admin.html.twig', [
            'title' => 'Page gestion admin EcoIT',
            'user' => $user,
            'count' => $count,
            'countteatcher'  => $countteatcher[0][1],
            'novalidteatcher'  => $novalidteatcher,
            'teatchervalide' => $teatchervalide,
        ]);
    }
    #[Route('/admin/valider/{id}', name: 'valid_post')]
    public function admin(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $validate = $entityManager->getRepository(User::class)->findOneBy(['id' => $id]);
        $validate->setValidate(1);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin');
    }
    #[Route('/admin/refuser/{id}', name: 'refuse_post')]
    public function refuse(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $refuse = $entityManager->getRepository(User::class)->findOneBy(['id' => $id]);
        $entityManager->remove($refuse);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin');
    }
}


/**
 * Require ROLE_SUPER_ADMIN only for this action
 *
 * @IsGranted("ROLE_SUPER_ADMIN")
 */

