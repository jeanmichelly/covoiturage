<?php

namespace CV\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RideType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('departure',         'text', array('data' => 'Paris'))
            ->add('arrival',           'text', array('data' => 'Marseille'))
            ->add('departureDate',     'text', array('data' => '2015/05/01'))
            ->add('price',             'integer', array('attr' => array('min' => '1', 'max' => '1000')))
            ->add('numberPassenger',   'integer', array('attr' => array('min' => '1', 'max' => '4')))
            ->add('details',           'textarea', array("required" => false, 'attr' => array('rows' => '5')))
            ->add('enregistrer',       'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CV\PlatformBundle\Entity\Ride'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'cv_platformbundle_ride';
    }
}
