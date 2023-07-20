<?php

namespace App\Form;

use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Name',
            'required' => 'Name is required',
            'constraints' => [
                new NotBlank(['message' => 'The Team name can be empty']),
            ],
            'row_attr' => [
                'placeholder' => 'Name',
                'class' => 'col-sm-2 col-form-label'
            ],
        ])

        ->add('country', CountryType::class, [
            'label' => 'Country',
            'required' => 'Name is required',
            'constraints' => [
                new NotBlank(['message' => 'The project name can be empty']),
            ],
            'row_attr' => [
                'placeholder' => 'Team name',
                'class' => 'col-sm-2 col-form-label'
            ],
        ])

            ->add('imageFile', VichImageType::class, [
                'label' => '',
                'required' => false,
                'row_attr' => [
                    'class' => 'col-sm-2 col-form-label'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}
