<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Series;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('synopsis', TextType::class, [
                'required'   => false,
                "label" => "Synopsis",
                'empty_data' => '',
            ])
            ->add('releaseDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('image')
            ->add('director', TextType::class, [
                'required'   => false,
                "label" => "Director",
                'empty_data' => '',
            ])                
            ->add('numberOfSeasons')
            ->add('genre', EntityType::class, [
                'class' => Genre::class,
                'label' => "Genres",
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('actor')
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
