<?php
namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class formularz extends AbstractType{
    public  function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')
        ->add("category", EntityType::class ,[
            'class' => "App\Entity\user",
            'placeholder' => "wpisz dane ",
            "mapped" => false 
        ]);
    }


}


