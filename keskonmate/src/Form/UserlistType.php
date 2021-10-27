<?php

namespace App\Form;

use App\Entity\UserList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserlistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('seasonNb')
            ->add('seriesNb')
            ->add('episodeNb')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('type')
            ->add('series')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserList::class,
        ]);
    }
}
