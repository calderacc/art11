<?php declare(strict_types=1);

namespace App\Form;

use App\Entity\ListItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hostname')
            ->add('regex')
            ->add('listType')
            ->add('reason');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ListItem::class,
        ]);
    }
}
