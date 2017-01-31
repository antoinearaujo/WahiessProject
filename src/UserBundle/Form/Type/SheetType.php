<?php

namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;



class ArticleType extends AbstractType
{
	
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', null, array('label' => 'Nom'))
            ->add('Message')
            
            ->add('Valider','submit')
        ;
    }

    public function setDefaultOption(OptionResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
           'data_class' => 'UserBundle\Entity\Sheet'
            ));
    }



	public function getName()
	{
	return 'sheet_form';
	}
}