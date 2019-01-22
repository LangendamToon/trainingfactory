<?php
/**
 * Created by PhpStorm.
 * User: 302025627
 * Date: 21-1-2019
 * Time: 12:00
 */

namespace AppBundle\Form;


use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrainingsvormType extends AbstractType
{
    /**
     * @Route("/")
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam')
            ->add('beschrijving',TextareaType::class)
            ->add('duur', TimeType::class)
            ->add('kosten', MoneyType::class)
            ->add('save', SubmitType::class)
            ->getForm();
    }

    /**
     * @Route("/")
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Trainingsvorm'
        ]);
    }

}