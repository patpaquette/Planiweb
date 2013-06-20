<?php

namespace Planiweb\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserCommentContextType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('context')
            ->add('user')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Planiweb\ModelBundle\Entity\UserCommentContext'
        ));
    }

    public function getName()
    {
        return 'planiweb_modelbundle_usercommentcontexttype';
    }
}
