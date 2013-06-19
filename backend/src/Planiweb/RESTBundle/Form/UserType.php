<?php

namespace Planiweb\RESTBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            ->add('role')
            ->add('info')
        ;
    }

    public function getName()
    {
        return 'planiweb_restservicesbundle_usertype';
    }
}
