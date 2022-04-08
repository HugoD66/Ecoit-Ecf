<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;

class PostulerController extends AbstractController
{
    #[Route('/postuler', name: 'app_postuler')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
    $user = new User();
    $form = $this->createForm(User::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user = $form->getData();
            // encode the plain password
            $user->setPassword(
                $user->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $entityManager->persist($user);
            $entityManager->flush();
            // ... perform some action, such as saving the task to the database
            return $this->redirectToRoute('app_home');
        }
        return $this->render('postuler/index.html.twig', [
            'form' => $this->createFormBuilder(User::class),
            'title' => 'Postuler pour EcoIT',
        ]);
    }
}
