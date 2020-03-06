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
                'multiple' => true,
                'remote_route' => 'category_json',
                'remote_params' => [], // static route parameters for request->query
                'class' => 'App\Entity\Category',
                'primary_key' => 'id',
                'text_property' => 'title',
                'minimum_input_length' => 2,
                'page_limit' => 10,
                'allow_clear' => true,
                'delay' => 250,
                'cache' => true,
                'cache_timeout' => 60000, // if 'cache' is true
                'language' => 'en',
                'placeholder' => 'Select a country',
                'query_parameters' => [
                    'start' => new \DateTime(),
                    'end' => (new \DateTime())->modify('+5d'),
                    // any other parameters you want your ajax route request->query to get, that you might want to modify dynamically
                ],
                // 'object_manager' => $objectManager, // inject a custom object / entity manager
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
