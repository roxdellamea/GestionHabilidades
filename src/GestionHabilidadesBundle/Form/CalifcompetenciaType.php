<?php

namespace GestionHabilidadesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CalifcompetenciaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni')
            ->add('mes')
            ->add('competencia')
            ->add('nota', 'choice', array('choices'=> array('NE' => 'NE', '1' => '1','2' => '2', '3' => '3'), 'placeholder' => 'Seleccionar'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionHabilidadesBundle\Entity\Califcompetencia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gestionhabilidadesbundle_califcompetencia';
    }
}
