<?php


namespace App\Controller;


use App\Form\FormationType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateFormController extends AbstractController
{
    #[Route('/createform', name: 'app_createform')]
    public function createFormation(ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(FormationType::class);



         return $this->render('formation/createform.html.twig', [
        'form' => $form->createView(),
        'title' => 'Creation de Formation Eco IT',
    ]);
    }
}

