<?php
/**
 * Created by PhpStorm.
 * User: Duy Anh
 * Date: 22/02/2018
 * Time: 2:36 SA
 */

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class Phase1Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location', TextType::class, array('label' => 'Search place '))
            ->add('icon', ChoiceType::class, array('label' => 'Change Marker Icon ',
                'choices' => array(
                    'Type' => array(
                        'Default' => 1,
                        'Parking' => 2,
                        'Information' => 3,
                        'Library' => 4,
                    ),
                    'Color' => array(
                        'Blue' => 5,
                        'Red' => 6,
                        'Purple' => 7,
                        'Yellow' => 8,
                        'Green' => 9,
                    )

                )
            ))
            ->add('save', SubmitType::class, array('label' => "Search"))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Location::class
        ));
    }
}