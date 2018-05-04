<?php
// src/AppBundle/Form/ProfileType.php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ville')
            ->add('description')
            ->add('image', FileType::class, array('label' => 'Image(JPG)', 'data_class' => null))
        ;
    }

//    - - - - - - - - - - - -
 
//    - - - - - - - - - - - -

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}