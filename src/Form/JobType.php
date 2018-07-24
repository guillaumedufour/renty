<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class JobType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder
                ->add('jobTitle', TextType::class, array('label' => 'titre de l\'annonce'))
                ->add('jobContent', TextareaType::class, array('label' => 'description de l\'annonce'))
                ->add('jobDateBegin', DateType::class, array('label' => 'date de commencement'))
                ->add('jobWages', IntegerType::class, array('label' => 'loyer mensuel'))
                ->add('housed', CheckboxType::class, array('label' => 'logé?', 'required' => false))
                ->add('jobPlace')
                ->add('jobSector')
           ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }

}
