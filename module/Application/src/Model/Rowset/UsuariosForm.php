<?php
namespace Application\Form;

use \Laminas\Form\Element;

class UsuarioForm extends \Laminas\Form\Form implements \Laminas\InputFilter\InputFilterProviderInterface
{

     const ELEMENT_NOME = 'nome';

     const ELEMENT_EMAIL = 'email';

     const ELEMENT_SENHA = 'senha';

     const ELEMENT_ID = 'id';

    public function __construct($name = 'Usuario_form', array $params = [])
    {
        parent::__construct($name, $params);
        $this->setAttribute('class', 'styledForm');

        $this->add([
            'name' => self::ELEMENT_NOME,
            'type' => 'text',
            'options' => [
                'label' => 'nome'
            ],
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->add([
            'name' => self::ELEMENT_EMAIL,
            'type' => 'text',
            'options' => [
                'label' => 'email'
            ],
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->add([
            'name' => self::ELEMENT_SENHA,
            'type' => 'text',
            'options' => [
                'label' => 'senha'
            ],
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->add([
            'name' => self::ELEMENT_ID,
            'type' => 'hidden',
            'options' => [
                'label' => 'id'
            ],
            'attributes' => [
                'required' => true
            ]
        ]);


        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Submit',
                'class' => 'btn btn-primary'
            ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [];
    }


}