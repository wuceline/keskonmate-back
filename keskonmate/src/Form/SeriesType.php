<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Series;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('Synopsis', null, [
                "label" => "Synopsis",
            ])
            ->add('releaseDate')
            ->add('image')
            ->add('director')
            ->add('numberOfSeasons')
            ->add('genre', EntityType::class, [
                'class' => Genre::class,
                'label' => "Genres",
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('actor', EntityType::class, [
                'class' => Actor::class,
                'label' => "Actors",
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('homeOrder')
            ->add('createdAt', DateTimeType::class, [
                'input'  => 'datetime_immutable',
                'disabled' => 'disabled'
            ])
            ->add('updatedAt', DateTimeType::class, [
                'input'  => 'datetime_immutable',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Series::class,
        ]);
    }
}
