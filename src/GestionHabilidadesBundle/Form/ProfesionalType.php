<?php

namespace GestionHabilidadesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfesionalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('dni')
            ->add('email','email')
            ->add('telefono')
            ->add('linkedin')
            ->add('guardar','submit',array('label' => 'Guardar'));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionHabilidadesBundle\Entity\Profesional'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'profesional';
    }
}
