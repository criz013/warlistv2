<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;
class DynamicJsonFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $structure = $options['structure'];
        $this->buildFields($builder, $structure);
    }

    private function buildFields(FormBuilderInterface $builder, array $structure, string $prefix = '')
    {
        foreach ($structure as $key => $value) {
            $fieldName = $prefix ? $prefix . '[' . $key . ']' : $key;

            if (is_array($value)) {
                // Cas 1 : tableau vide → champ texte à répéter
                if (empty($value)) {
                    $builder->add($fieldName, CollectionType::class, [
                        'entry_type' => TextType::class,
                        'allow_add' => true,
                        'allow_delete' => true,
                        'label' => $key
                    ]);
                }
                // Cas 2 : tableau avec tableau d’objet(s)
                elseif (array_is_list($value) && isset($value[0]) && is_array($value[0])) {
                    $builder->add($fieldName, CollectionType::class, [
                        'entry_type' => new class($value[0]) extends AbstractType {
                            private array $structure;
                            public function __construct(array $structure) {
                                $this->structure = $structure;
                            }
                            public function buildForm(FormBuilderInterface $builder, array $options) {
                                foreach ($this->structure as $key => $val) {
                                    $builder->add($key, is_array($val) ? CollectionType::class : TextType::class, [
                                        'required' => false,
                                    ]);
                                }
                            }
                        },
                        'allow_add' => true,
                        'allow_delete' => true,
                        'label' => $key
                    ]);
                }
                // Cas 3 : objet simple → sous-formulaire
                else {
                    $builder->add($fieldName, new class($value) extends AbstractType {
                        private array $structure;
                        public function __construct(array $structure) {
                            $this->structure = $structure;
                        }
                        public function buildForm(FormBuilderInterface $builder, array $options) {
                            foreach ($this->structure as $k => $v) {
                                $builder->add($k, is_array($v) ? CollectionType::class : TextType::class, [
                                    'required' => false,
                                ]);
                            }
                        }
                    }, [
                        'label' => $key
                    ]);
                }
            } else {
                // Champ simple
                $builder->add($fieldName, TextType::class, [
                    'required' => false,
                    'label' => $key
                ]);
            }
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'structure' => [],
            'data_class' => null,
        ]);
    }

}

