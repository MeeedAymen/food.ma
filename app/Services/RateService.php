<?php

namespace App\Services;

use App\Repositories\RateRepository;

class RateServices
{
    protected $repository;

    public function __construct(RateRepository $rate)
    {
        $this->repository = $rate;
    }
    public function get(array $select = ['*'])
    {
        return $this->repository->get($select);
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->find($id)->update($data);
    }

    public function destroy(int $id)
    {
        return $this->repository->find($id)->delete();
    }
}