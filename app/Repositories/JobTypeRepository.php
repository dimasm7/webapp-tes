<?php

namespace App\Repositories;

use App\Models\JobType;

class JobTypeRepository
{
    public function find($id) {
        return $this->model()::find($id);
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
        return JobType::class;
    }
}