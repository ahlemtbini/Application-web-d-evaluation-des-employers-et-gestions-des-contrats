<?php

namespace App\Form;

use App\Entity\ObjectifRe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('MTR')
           
             ->add('objectif')    
             ->add('nb_realisation')
             ->add('numsession')
             

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ObjectifRe::class,
        ]);
    }
}
