<?php

namespace Planiweb\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserCommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text')
            ->add('date')
            ->add('context')
            ->add('user')
            ->add('students')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Planiweb\ModelBundle\Entity\UserComment'
        ));
    }

    public function getName()
    {
        return 'planiweb_modelbundle_usercommenttype';
    }
}
