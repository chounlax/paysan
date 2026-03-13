<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Parcelle;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SupprimerParcelleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('parcelles1', EntityType::class, [
            'class' => Parcelle::class,
            'choices' => $options['parcelles'],
            'choice_label' => 'nomparcelle',
            'expanded' => true,
            'multiple' => true,
            'label' => false, 'mapped' => false])
            ->add('supprimer', SubmitType::class, ['attr' => ['class'=> 'btn bg-primary text-white m-4' ],
           'row_attr' => ['class' => 'text-center'],]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'parcelles' => []

        ]);
    }
}
