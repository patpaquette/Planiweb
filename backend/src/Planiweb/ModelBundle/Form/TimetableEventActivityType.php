<?php

namespace Planiweb\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TimetableEventActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activity')
            ->add('timetableEvent')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Planiweb\ModelBundle\Entity\TimetableEventActivity'
        ));
    }

    public function getName()
    {
        return 'planiweb_modelbundle_timetableeventactivitytype';
    }
}
