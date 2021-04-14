<?php

namespace App\Form;

use App\Entity\Forman;
use App\Entity\Eventos;
use App\Entity\Equipos;
use App\Entity\Concursantes;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Query\Expr\Join;

class FormanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rol')
            ->add('nombreEquipo', EntityType::class, [
                'class' => Equipos::class,
                'query_builder'=>function(EntityRepository $tipo){
                   
                    return $tipo->createQueryBuilder('e')
                    ->orderBy('e.nombreEquipo', 'ASC');
           
            
        }, 'choice_label'=>'nombreEquipo', 'placeholder' => 'Elegir prueba',
            ])
            ->add('idConcursante', EntityType::class, [
                'class'=>Concursantes::class,
                'query_builder'=>function(EntityRepository $tipo){
                   
                    return $tipo->createQueryBuilder('e')
                    ->orderBy('e.nombre', 'ASC');
           
            
        }, 'choice_label'=>'nombre', 'placeholder' => 'Elegir prueba',
                
            ])
            ->add('idEvento', EntityType::class, [
                'class'=>Eventos::class,
                'query_builder'=>function(EntityRepository $tipo){
                   
                    return $tipo->createQueryBuilder('e')
                    ->orderBy('e.idEvento', 'ASC');
           
            
        }, 'choice_label'=>'nombreEvento', 'placeholder' => 'Elegir prueba',
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Forman::class,
        ]);
    }
}
