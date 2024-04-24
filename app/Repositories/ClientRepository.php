<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    protected $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
    }
    public function get(array $select)
    {
        return $this->model->get($select);
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy(int $id)
    {
        return $this->model->find($id)->delete();
    }
}

