<?php

namespace App\Form;

use App\Entity\Tache;
use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TacheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'a faire' => 1,
                    'en cours' => 2,
                    'termine' => 3,
                ],
                'choice_attr' => [
                    'a faire' => ['data-tache' => 'a faire'],
                    'en cours' => ['data-tache' => 'en cours'],
                    'termine' => ['data-tache' => 'termine'],
                ],
            ])
            ->add('utilisateur',EntityType::class,['class'=>Utilisateur::class,
            'choice_label'=>'nom',
            'label'=>'nom'
            ])

            // ->add('statut',EntityType::class,['class'=>Tache::class,
            // 'choice_label'=>'1',
            // 'label'=>'tache'
            // ])

            ->add('DateLimite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tache::class,
        ]);
    }
}
