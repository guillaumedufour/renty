<?php

namespace App\Form;

use App\Entity\Rent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rentTitle')
            ->add('rentContent')
            ->add('rentDatePost')
            ->add('dispoDate')
            ->add('monthCost')
            ->add('rentSurface')
            ->add('furnished')
            ->add('rentAuthor')
            ->add('rentContact')
            ->add('rentPlace')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rent::class,
        ]);
    }
}
