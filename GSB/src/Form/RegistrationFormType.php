<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\IsTrue;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login',TextType::class,
            ['label'=>'Pseudo', 'attr'=>[
                "placeholder"=>"Votre pseudo"
            ]])
            ->add('password',PasswordType::class,
            ['label'=>'Mot de passe', 'attr'=>[
                "placeholder"=>"Votre mot de passe"
            ]])
            ->add('nom',TextType::class,
            ['label'=>'Nom', 'attr'=>[
                "placeholder"=>"Votre nom"
            ]])
            ->add('prenom',TextType::class,
            ['label'=>'Prenom', 'attr'=>[
                "placeholder"=>"Votre prenom"
            ]])
            ->add('status',CheckBoxType::class,
            ['label'=>'Etes vous un visiteur?',
            'required'=>false
            ])
            
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
