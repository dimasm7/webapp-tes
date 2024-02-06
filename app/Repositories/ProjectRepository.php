<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function find($id) {
        return $this->model()::find($id);
    }
    public function store(array $data) {
        return $this->model()::create($data);
    }
    public function update(array $data, $id) {
        return $this->model()::update($data, $id);
    }
    public function delete($id) {
        return $this->find($id)->delete();
    }
    public function model() {
        return Project::class;
    }
}