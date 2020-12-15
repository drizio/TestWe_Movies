<?php


namespace App\Form;


use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => [
                    "maxlength" => 70
                ]
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    "maxlength" => 70
                ]
            ])
            ->add('dateofBirth', DateType::class, [
                'format' => 'dd-MM-yyyy',
                'years' => range(1930, 2018)
            ])
            ->add('nationality', TextType::class, [
                'attr' => [
                    "maxlength" => 70
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}