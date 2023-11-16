<?php
namespace Application\Model\Rowset;

use Laminas\Filter\ToInt;

class Usuario extends AbstractModel implements \Laminas\InputFilter\InputFilterAwareInterface
{

    public $inputFilter = null;

    public $nome = null;

    public $email = null;

    public $senha = null;

    public $id = null;

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($value)
    {
        $this->nome = $value;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($value)
    {
        $this->senha = $value;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
        return $this;
    }

    public function exchangeArray(array $row)
    {
        $this->id = (!empty($row['id'])) ? $row['id'] : null;
        $this->nome = (!empty($row['nome'])) ? $row['nome'] : null;
        $this->email = (!empty($row['email'])) ? $row['email'] : null;
        $this->senha = (!empty($row['senha'])) ? $row['senha'] : null;
        $this->id = (!empty($row['id'])) ? $row['id'] : null;
    }

    public function getArrayCopy()
    {
        return[
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'email' => $this->getEmail(),
            'senha' => $this->getSenha(),
            'id' => $this->getId(),
        ];
    }

    public function getInputFilter(bool $includeIdField = true)
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new \Laminas\InputFilter\InputFilter();

        if ($includeIdField) {
            $inputFilter->add([
                'name' => 'id',
                'required' => true,
                'filters' => [
                    ['name' => ToInt::class],
                ],
            ]);
        }
        $inputFilter->add([
            'name' => 'nome',
        ]);

        $inputFilter->add([
            'name' => 'email',
        ]);

        $inputFilter->add([
            'name' => 'senha',
        ]);


        $this->inputFilter = $inputFilter;
        return $inputFilter;
    }

    public function setInputFilter(\Laminas\InputFilter\InputFilterInterface $inputFilter)
    {
        throw new DomainException('This class does not support adding of extra input filters');
    }


}
