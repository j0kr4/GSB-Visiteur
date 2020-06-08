<?php

namespace App\Form;

use App\Entity\FicheFrais;
use App\Entity\Etat;
use App\Entity\Visiteur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheFraisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mois',DateType::class, array('label'=>'mois:','attr'=>array('class'=>'form-control', 'placeholder'=>'mois')))
            ->add('nbJustificatifs',NumberType::class, array('label'=>'nbJustificatifs:','attr'=>array('class'=>'form-control', 'placeholder'=>'nbJustificatifs')))
            ->add('montantValide',NumberType::class, array('label'=>'montantValide:','attr'=>array('class'=>'form-control', 'placeholder'=>'montantValide')))
            ->add('dateModif',DateType::class, array('label'=>'dateModif:','attr'=>array('class'=>'form-control', 'placeholder'=>'dateModif')))
            ->add('visiteur', EntityType::class, array('class' => Visiteur::class , 'choice_label' => 'nom', 'label' => "Visiteur"))
            ->add('etat',EntityType::class, array('class'=> Etat::class, 'choice_label'=>'libelle', 'label' => "Etat"))
            ->add('valider',SubmitType::class, array('label'=>'Valider','attr'=>array('class'=>'btn btn-primary btn-block')))   
            ->add('annuler',ResetType::class, array('label'=>'Quitter','attr'=>array('class'=>'btn btn-primary btn-block')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FicheFrais::class,
        ]);
    }
}
