<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Annonce;
use App\Entity\Equipement;

use App\Entity\TypeLogement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //Création du formulaire en rapport avec no propriétés
        $builder
            ->add(child:'prix', options:[
                'attr'=>['class'=>'form-control'],
            ])
            ->add(child:'size', options:[
                'attr'=>['class'=>'form-control']
            ])
            ->add(child:'nombreCouchage', options:[
                'attr'=>['class'=>'form-control']
            ])
            ->add('address', EntityType::class, [
                'class' => Address::class,
                'attr'=>['class'=>'form-control'],
'choice_label' => 'city',

            ])
            ->add('equipement', EntityType::class, [
                'class' => Equipement::class,
                'attr'=>['class'=>'form-control'],
'choice_label' => 'label',
'multiple' => true,
            ])
            ->add('typeLogement', EntityType::class, [
                'class' => TypeLogement::class,
                'attr'=>['class'=>'form-control'],
'choice_label' => 'label',
            ])
            ->add('address', AddressType::class,[
                'label'=>false,
                'attr'=>['class'=>'form-control'],
            ])
            ->add('imageFile', FileType::class, [
                "required" => false,
                "label" => "Image",
                'attr'=>['class'=>'form-control']
            ])
            ->add('save', SubmitType::class, ['label'=> "Enregistrer"])
            
        ;
        
    }

    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
