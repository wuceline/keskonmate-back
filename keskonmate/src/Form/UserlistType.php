<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\UserList;
use DateTimeImmutable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserlistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('users', EntityType::class, [
                'class' => User::class
            ])
            ->add('seasonNb', TextType::class)
            ->add('episodeNb', TextType::class)
            ->add('type', TextType::class)
            ->add('createdAt', DateTimeType::class, [
                'input'  => 'datetime_immutable',
                'disabled' => 'disabled',
            ])
            ->add('updatedAt', DateTimeType::class, [
                'input'  => 'datetime_immutable',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserList::class,
            "allow_extra_fields" => true
        ]);
    }
}
