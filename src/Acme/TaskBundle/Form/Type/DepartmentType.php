<?php
/** Created by PhpStorm... */
namespace Acme\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('department')
            ->add('save', 'submit');
    }

    /**
     * Returns the default options/class for this form.
     * @param array $options
     * @return array The default options
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Acme\TaskBundle\Entity\Department'
        );
    }

    public function getName()
    {
        return 'department';
    }
}