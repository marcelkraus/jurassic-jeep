<?php

namespace App\Form\Type;

use App\Entity\ContactRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactRequestType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $form = $builder
            ->add('firstName', TextType::class, [
                'label' => 'Vorname',
                'attr' => ['placeholder' => 'z.B. John'],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nachname',
                'attr' => ['placeholder' => 'z.B. Hammond'],
            ])
            ->add('emailAddress', EmailType::class, [
                'label' => 'E-Mail-Adresse',
                'attr' => ['placeholder' => 'z.B. john@ingen.example'],
            ])
            ->add('phone', TextType::class, [
                'label' => 'Mobil (optional)',
                'required' => false,
                'attr' => ['placeholder' => 'z.B. +49 1234 123456'],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Deine Nachricht',
                'attr' => [
                    'rows' => 5,
                    'placeholder' => 'z.B. „Sie sollten hierher kommen, um mich gegen diese Figuren zu verteidigen – und der einzige der jetzt auf meiner Seite ist, ist der blutsaugende Anwalt!“ :)'
                ],
            ])
        ;

        $form->add('send', SubmitType::class, [
                'label' => 'Nachricht senden'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactRequest::class,
            'environment' => 'prod',
        ]);

        $resolver->setRequired('environment');
        $resolver->setAllowedTypes('environment', 'string');
    }
}
