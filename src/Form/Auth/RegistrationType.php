<?php


namespace App\Form\Auth;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', Type\TextType::class, [
                'required' => true,
                'label' => 'user.username'
            ])
            ->add('email', Type\EmailType::class, [
                'required' => true,
                'label' => 'user.email',
            ])
            ->add('plainPassword', Type\RepeatedType::class, [
                'required' => true,
                'type' => Type\PasswordType::class,
                'first_options' => [
                    'label' => 'user.password'
                ],
                'second_options' => [
                    'label' => 'user.re-password'
                ],
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