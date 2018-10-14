<?php

namespace App\Form;

use App\Entity\Organisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array(
                'attr'=> array(
                'placeholder' => 'votre nom',
                'class' => 'form-control')))
            ->add('mail',null,array(
                'attr'=> array(
                'placeholder' => 'votre mail',
                'class' => 'form-control')))
            ->add('tel',null,array(
                'attr'=> array(
                'placeholder' => 'votre numéro de téléphone',
                'class' => 'form-control')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Organisateur::class,
        ]);
    }
}
