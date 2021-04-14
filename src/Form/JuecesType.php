<?php


namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Jueces;
use App\Entity\Eventos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class JuecesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('departamento')
            ->add('intolerancia')
            ->add('correo')
            ->add('clave')
            ->add('idEvento')
        //Añadimos el botón de enviar un nuevo deportista
        ->add('Enviar', SubmitType::class, ['label'=>'Eviar inscripcion', 'attr'=>['class'=>'btn bg-warning']])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jueces::class,
        ]);
    }
}
