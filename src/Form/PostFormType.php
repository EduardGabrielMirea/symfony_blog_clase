<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                    'attr' => ['class' => 'form-control-file'],
                    'required' => true,
                ])
            ->add('content', TextareaType::class, [
                    'attr' => ['class' => 'form-control-file'],
                    'required' => true,
                ])
            ->add('image', FileType::class, [
                'label' => 'Imagen (PNG, JPG)',
                'mapped' => false, // No está mapeado a la entidad
                'required' => true,
                'attr' => ['class' => 'form-control-file'],
            ])
            ->add('send', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
