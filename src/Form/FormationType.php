<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class FormationType extends AbstractType
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
            ->add('image')
            ->add('description', TextareaType::class, [
                'label' => 'Corps de l\'article'
            ])
            ->add('publishedAt')
            ->add('createdBy', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username',
            ])
            ->add('isValidate', CheckboxType::class, [
                'label' => 'Publier l\'article'
            ])
            ->add('submit', SubmitType::class, array(
                'label' => 'Enregistrer'
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
