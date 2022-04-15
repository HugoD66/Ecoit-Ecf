<?php

namespace App\Form;

use App\Entity\Study;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class StudyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ ne peut être vide'
                    ])
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Corps de l\'article'
            ])            ->add('document', FileType::class)
            ->add('formation', ChoiceType::class, [
                'choice_label' =>  $options['title'] ,
            ])
            ->add('submit', SubmitType::class, array(
                'label' => 'Enregistrer'
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
                'test2' => false,
                'form' => $form,
            ]
        );
    }
}
