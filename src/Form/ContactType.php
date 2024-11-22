<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'label' => 'Votre nom', 
                'attr' => [
                    'autocomplete' => 'off',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre mail',
                'attr' => [
                    'autocomplete' => 'off',
                ],
            ])
            ->add('subject', TextType::class, [
                'label' => 'Sujet',
                'attr' => [
                    'autocomplete' => 'off',
                ],
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'rows' => 10, // Nombre de lignes
                    'cols' => 50, // Nombre de colonnes
                ],
                'label' => 'Message'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                 'attr' => [
                    'class' => 'button'
                 ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}