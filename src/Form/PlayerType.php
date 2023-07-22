<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Firstname',
                'required' => 'Firstname is required',
                'constraints' => [
                    new NotBlank(['message' => 'The Firstname cant be empty']),
                ],
                'row_attr' => [
                    'placeholder' => 'Firstname',
                    'class' => 'col-sm-2 col-form-label'
                ],
            ])

            ->add('lastname', TextType::class, [
                'label' => 'Lastname',
                'required' => 'Lastname is required',
                'constraints' => [
                    new NotBlank(['message' => 'The Lastname cant be empty']),
                ],
                'row_attr' => [
                    'placeholder' => 'Lastname',
                    'class' => 'col-sm-2 col-form-label'
                ],
            ])

            ->add('country', CountryType::class, [
                'label' => 'Country',
                'row_attr' => [
                    'placeholder' => 'Country',
                    'class' => 'col-sm-2 col-form-label'
                ],
            ])

            ->add('position', TextType::class, [
                'label' => 'Position',
                'required' => 'Position is required',
                'constraints' => [
                    new NotBlank(['message' => 'The Position cant be empty']),
                ],
                'row_attr' => [
                    'placeholder' => 'Lastname',
                    'class' => 'col-sm-2 form-label'
                ],
            ])

            ->add('number', IntegerType::class, [
                'label' => 'Number',
                'required' => 'Number is required',
                'constraints' => [
                    new NotBlank(['message' => 'The Number cant be empty']),
                ],
                'row_attr' => [
                    'placeholder' => 'Number',
                    'class' => 'col-sm-2 col-form-label'
                ],
            ])

            ->add('team', null, [
                'label' => '',
                'required' => 'Team is required',
                'row_attr' => [
                    'placeholder' => 'Team',
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
            'data_class' => Player::class,
        ]);
    }
}
