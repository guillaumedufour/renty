<?php

namespace App\Form;

use App\Entity\Rent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Place;



class RentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
    

        $builder
                ->add('rentTitle', TextType::class, array('label' => 'titre de l\'annonce'))
                ->add('rentContent', TextareaType::class, array('label' => 'description de l\'annonce','trim'=>false))
                ->add('dispoDate', DateType::class, array('label' => 'date de disponibilité'))
                ->add('monthCost', IntegerType::class, array('label' => 'loyer mensuel'))
                ->add('rentSurface', IntegerType::class, array('label' => 'surface logement'))
                ->add('furnished', CheckboxType::class, array('label' => 'le logement est il meublé?', 'required' => false))
                ->add('rentPlace', EntityType::class,array('class'=>Place::class, 'label'=>'Ville / Village / Station'))
                ->add('picture', FileType::class, array('label' => 'veuillez télécharger une image d\'illustation','data_class' => null,'required' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Rent::class,
        ]);
    }

}
