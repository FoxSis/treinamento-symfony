<?php

namespace App\Form;

use App\Entity\Chamado;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChamadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('dataAbertura')
            // ->add('dataAtualizacao')
            // ->add('dataConclusao')
            ->add('assunto')
            ->add('descricao')
            ->add('prioridade')
            ->add('tipo')
            ->add('status')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chamado::class,
        ]);
    }
}
