<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ville')
            ->add('photo')
            ->add('description')
            ->add('isActive');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getVille()
    {
        return $this->getBlockPrefix();
    }

    public function getPhoto()
    {
        return $this->getBlockPrefix();
    }

    public function getDescription()
    {
        return $this->getBlockPrefix();
    }

    public function getIsActive()
    {
        return $this->getBlockPrefix();
    }

}