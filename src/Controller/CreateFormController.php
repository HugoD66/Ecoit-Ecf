<?php


namespace App\Controller;

use App\Entity\Formation;
use App\Entity\User;
use App\Form\FormationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class CreateFormController extends AbstractController
{
    #[Route('/createform', name: 'app_createform')]
    public function new(Request $request): Response
    {
        $formation = new Formation();
        $username = $this->getUser()->getName() .' '. $this->getUser()->getLastname();
        $form = $this->createForm(FormationType::class, $formation, array(
            'test' => $username,
        ));
        //addFormation()//
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();
        return $this->redirectToRoute('task_success');
        }
         return $this->render('formation/createform.html.twig', [
        'form' => $form->createView(),
        'title' => 'Creation de Formation Eco IT',
    ]);
    }
}

