<?php

namespace App\Form;
use App\Entity\Eventos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Equipos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class EquiposType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreEquipo')
            ->add('triptico')
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
            'data_class' => Equipos::class,
        ]);
    }
}
