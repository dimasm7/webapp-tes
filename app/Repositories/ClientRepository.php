<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    public function find($id) {
        return $this->model()::find($id);
    }
    public function getAll() {
        return $this->model()::all();
    }
    public function store(array $data) {
        return $this->model()::create($data);
    }
    public function update(array $data, $id) {
        return $this->model()::find($id)->update($data);
    }
    public function delete($id) {
        return $this->find($id)->delete();
    }
    public function model() {
        return Client::class;
    }
}