<?php
/**
 * Created by PhpStorm.
 * User: 302025627
 * Date: 16-1-2019
 * Time: 12:00
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstructeurType extends AbstractType
{

    /**
     * @Route("/")
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('loginnaam')
            ->add('wachtwoord', PasswordType::class)
            ->add('naam')
            ->add('tussenvoegsel')
            ->add('achternaam')
            ->add('geboortedatum', BirthdayType::class)
            ->add('aanneem_datum', BirthdayType::class)
            ->add('salaris', MoneyType::class)
            ->add('persoonsnummer');


    }

    /**
     * @Route("/")
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Instructeur'
        ]);
    }

}