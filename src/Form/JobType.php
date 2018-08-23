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
use Symfony\Component\Form\Extension\Core\Type\FileType;

use App\Entity\SectorArea;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class JobType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder
                ->add('jobTitle', TextType::class, array('label' => 'titre de l\'annonce'))
                ->add('jobContent', TextareaType::class, array('label' => 'description de l\'annonce'))
                ->add('jobDateBegin', DateType::class, array('label' => 'date de commencement'))
                ->add('jobWages', IntegerType::class, array('label' => 'salaire mensuel'))
                ->add('housed', CheckboxType::class, array('label' => 'logé?', 'required' => false))
                ->add('jobPostalCode',IntegerType::class,array('label'=>'code postal'))
                ->add('jobPlace',TextType::class,array('label'=>'commune'))
                ->add('jobSector', EntityType::class, array('class'=> SectorArea::class,'label' =>'Secteur'))
                ->add('picture', FileType::class, array('label' => 'veuillez télécharger une image d\'illustation', 'data_class' => null, 'required' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }

}
