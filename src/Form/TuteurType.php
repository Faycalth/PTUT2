<?php

namespace App\Form;

use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class TuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, [
                'label' => 'Identifiant'
            ])
            ->add('email', null, [
                'label' => 'Email'
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}
