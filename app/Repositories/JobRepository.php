<?php

namespace App\Repositories;

use App\Models\Job;

class JobRepository
{
    public function find($id) {
        return $this->model()::find($id);
    }
    public function getAll() {
        return $this->model()::all();
    }
    public function getAllWithJobType() {
        return $this->model()::with('job_types:id,name')->get();
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
        return Job::class;
    }
}