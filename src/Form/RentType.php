<?php

namespace App\Form;

use App\Entity\Rent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class RentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('rentTitle')
                ->add('rentContent')
                ->add('rentDatePost')
                ->add('dispoDate')
                ->add('monthCost')
                ->add('rentSurface')
                ->add('furnished')
                ->add('rentPlace')
                //->add('rentContact', HiddenType::class, array(
                  //  'data' => $userId
               // ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Rent::class,
        ]);
    }

}
