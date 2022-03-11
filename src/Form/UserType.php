<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder 

            ->add('email',EmailType::class,[
                'constraints' =>[
                    new NotBlank([
                        'message'=>'entre votre mot email'
                    ])
                    ],
                    'label' => false, 
                    'attr' => [
                        'placeholder' => 'Email'
                    ]
            ])
            ->add('roles', ChoiceType::class, [
            
                'mapped' => false,
                'choices'  => [
                        'Admin'=> 'ROLE_ADMIN',
                        'User'=> 'ROLE_USER' ,
                ]
                
            ])
            ->add('password',PasswordType::class,[
                'label' => false, 
                'attr' => [
                    'placeholder' => 'Password'
                ]
            ])
            ->add('name', TextType::class,[
                'label' => false, 
                'attr' => [
                    'placeholder' => 'Name'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
