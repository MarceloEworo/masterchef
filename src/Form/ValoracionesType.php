<?php

namespace App\Form;

use App\Entity\Valoraciones;
use App\Entity\Jueces;
use App\Entity\Eventos;
use App\Entity\Concursantes;
use App\Entity\Equipos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ValoracionesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('presentacion')
            ->add('servicio')
            ->add('sabor')
            ->add('imagen')
            ->add('triptico')
            ->add('idJuez', EntityType::class, [
                'class'=>Jueces::class,
                'query_builder'=>function(EntityRepository $tipo){
                   
                    return $tipo->createQueryBuilder('e')
                    ->orderBy('e.nombre', 'ASC');
           
            
        }, 'choice_label'=>'nombre', 'placeholder' => '...Juez...',])
            ->add('nombreEquipo')
            ->add('idEvento', EntityType::class, [
                'class'=>Eventos::class,
                'query_builder'=>function(EntityRepository $tipo){
                   
                    return $tipo->createQueryBuilder('e')
                    ->orderBy('e.nombreEvento', 'ASC');
           
            
        }, 'choice_label'=>'nombreEvento', 'placeholder' => 'Eventos...',])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Valoraciones::class,
        ]);
    }
}
