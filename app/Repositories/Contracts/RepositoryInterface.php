<?php

declare(strict_types = 1);

namespace App\Repositories\Contracts;


interface RepositoryInterface
{
    public function findAll($columns = ['*']);

    public function paginate($perPage = 15, $columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = ['*']);

    public function findBy($conditions = [], $columns = ['*']);

    public function findOneBy($field, $value, $columns = ['*']);

}