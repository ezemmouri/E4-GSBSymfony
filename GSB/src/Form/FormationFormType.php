<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class FormationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $time = new \DateTime();
        $builder
            ->add('dateDebut',DateTimeType::class,[
                'label'=>'Date du début',
                'data'=>  $time
            ])
            ->add('nbreHeures',IntegerType::class,[
                'label'=>'Nombre d\'heures'
            ])
            ->add('departement')
            ->add('ville')
            ->add('produit',EntityType::class,[
                'class' => Produit::class,
                'choice_label' => 'libelle'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
