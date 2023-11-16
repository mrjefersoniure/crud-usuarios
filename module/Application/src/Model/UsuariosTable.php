<?php
namespace Application\Model;

class UsuariosTable extends AbstractTable
{

    protected $resultsPerPage = 10;

    public function getById($id)
    {
        return $this->getBy(['id' => $id]);
    }

    public function getBy(array $params = [])
    {
        $select = $this->tableGateway->getSql()->select();

        if (isset($params['id'])) {
            $select->where(['id' => $params['id']]);
            $params['limit'] = 1;
        }

        if (isset($params['nome'])) {
            $select->where(['nome' => $params['nome']]);
        }

        if (isset($params['email'])) {
            $select->where(['email' => $params['email']]);
        }

        if (isset($params['senha'])) {
            $select->where(['senha' => $params['senha']]);
        }



        if (isset($params['limit'])) {
            $select->limit($params['limit']);
        }

        if (!isset($params['page'])) {
            $params['page'] = 0;
        }

        $result = (isset($params['limit']) && $params['limit'] == 1)
            ? $this->fetchRow($select)
            : $this->fetchAll($select, ['limit' => $this->resultsPerPage, 'page' => $params['page']]);

        return $result;
    }

    public function patch(int $id, array $data)
    {
        if (empty($data)) {
            throw new \Exception('missing data to update');
        }
        $passedData = [];

        if (!empty($data['nome'])) {
            $passedData['nome'] = $data['nome'];
        }

        if (!empty($data['email'])) {
            $passedData['email'] = $data['email'];
        }

        if (!empty($data['senha'])) {
            $passedData['senha'] = $data['senha'];
        }


        $this->tableGateway->update($passedData, ['id' => $id]);
    }

    public function save(\Application\Model\Rowset\Usuario $rowset)
    {
        return parent::saveRow($rowset);
    }

    public function delete($id)
    {
        if (empty($id)) {
            throw new \Exception('missing UsuariosTable id to delete');
        }
        parent::deleteRow($id);
    }


}