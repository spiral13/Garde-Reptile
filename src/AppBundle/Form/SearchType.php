<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 08/05/18
 * Time: 22:30
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', TextType::class);
    }

    public function getName ()
    {
        return 'appbundle_search';
    }

}