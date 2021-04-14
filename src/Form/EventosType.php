<?php

namespace App\Form;

use App\Entity\Eventos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreEvento')
            ->add('fecha')
            ->add('hora')
            ->add('estado')
            ->add('descripcion')
            ->add('lugar')
            ->add('presentacion')
            ->add('servicio')
            ->add('sabor')
            ->add('imagen')
            ->add('triptico')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eventos::class,
        ]);
    }
}
