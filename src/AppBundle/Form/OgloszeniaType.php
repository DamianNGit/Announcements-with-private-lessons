<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OgloszeniaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('tresc', null, [
                    'label' => false,
                    'attr' => [ 'placeholder' => 'Treść ogłoszenia', 'help' => 'test' ],
                    //'help'  => 'some usefull help message',
                    'csrf_message' => 'Here some help text!!!'
                ])
                ->add('szkola', null, [
                    'label' => false,
                    'attr' => [ 'placeholder' => 'Jaki rodzaj szkoły (podstawówka, gimnazjum, liceum)' ],
                ])
                ->add('przedmiot', null, [
                    'label' => false,
                    'attr' => [ 'placeholder' => 'Przedmiot szkolny (matematyka, fizyka, itp.' ],
                ])
                ->add('kontakt', null, [
                    'label' => false,
                    'attr' => [ 'placeholder' => 'Kontakt (nr tel, e-mail)' ],
                ])
                ->add('cena', null, [
                    'label' => false,
                    'attr' => [ 'placeholder' => 'Cena za godzinę(zł)' ],
                ]);
    }
    
    /*
     * 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tresc')->add('szkola')->add('przedmiot')->add('kontakt')->add('cena')->add('user');
    }
     * 
     * 
     * 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tresc')->add('szkola')->add('przedmiot')->add('kontakt')->add('cena')->add('user', EntityType::class, [
            'class' => 'AppBundle:User',
        ]);
    } 
     */
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ogloszenia'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ogloszenia';
    }


}
