<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,['label'=>'Title'])
            ->add('slug',TextType::class,['label'=>'Slug'])
            ->add('category', Select2EntityType::class, [
                'remote_route' => 'category_ajax_search_select2',
                'allow_clear' => true,
                'multiple' => false,
                'class' => 'App\Entity\Category',
                'primary_key' => 'id',
                'text_property' => 'title',
                'allow_add'=>[
                    'enabled'=>true
                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
