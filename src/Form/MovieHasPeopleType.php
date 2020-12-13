<?php

namespace App\Form;

use App\Entity\MovieHasPeople;
use App\Entity\Person;
use App\Enum\MovieRoleEnum;
use App\Enum\MovieSignificanceEnum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieHasPeopleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('person', EntityType::class, [
                'class' => Person::class,
                'choice_label' => 'fullname'
            ])
            ->add('role', ChoiceType::class, [
                'choices' => array_flip(MovieRoleEnum::$values),
                'required' => true
            ])
            ->add('significance', ChoiceType::class, [
                'choices' => array_flip(MovieSignificanceEnum::$values),
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MovieHasPeople::class,
        ]);
    }
}