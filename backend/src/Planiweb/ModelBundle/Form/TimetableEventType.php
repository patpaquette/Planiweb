<?php

namespace Planiweb\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TimetableEventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start_time')
            ->add('end_time')
            ->add('day')
            ->add('course')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Planiweb\ModelBundle\Entity\TimetableEvent'
        ));
    }

    public function getName()
    {
        return 'planiweb_modelbundle_timetableeventtype';
    }
}
