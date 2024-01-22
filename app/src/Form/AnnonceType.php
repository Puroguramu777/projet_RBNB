<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Annonce;
use App\Entity\Equipement;
use App\Entity\TypeLogement;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbreCouchage')
            ->add('prix')
            ->add('image')
            ->add('equipement', EntityType::class, [
                'class' => Equipement::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
'choice_label' => 'id',
            ])
            ->add('address', EntityType::class, [
                'class' => Address::class,
'choice_label' => 'id',
            ])
            ->add('typeLogement', EntityType::class, [
                'class' => TypeLogement::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
