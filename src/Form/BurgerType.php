<?php

namespace App\Form;

use App\Entity\Burger;
use App\Entity\Oignon;
use App\Entity\Pain;
use App\Entity\Sauce;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BurgerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom du burger',
            ])
            ->add('pain' , EntityType::class, [
                'class' => Pain::class,
                'choice_label' => 'Pain'
            ])
            ->add('pain' , EntityType::class, [
                'class' => Oignon::class,
                'choice_label' => 'Pain'
            ])
            ->add('pain' , EntityType::class, [
                'class' => Sauce::class,
                'choice_label' => 'Pain'
            ])
            ;
   }
    
   public function configureOptions(OptionsResolver $resolver): void
   {
       $resolver->setDefaults([
           'data_class' => Burger::class,
       ]);
   }
}