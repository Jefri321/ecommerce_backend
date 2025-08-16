<?php

namespace App\Services;

use App\Models\Training;

class TrainingService{
    
    public function getAll()
    {
        return Training::all();
    }

    public function create(array $data)
    {
        return Training::create($data);
    }

    public function update(int $id, array $data)
    {
        $training = Training::findOrFail($id);
        $training->update($data);
        return $training;
    }

    public function delete(int $id)
    {
        $training = Training::findOrFail($id);
        return $training->delete();
    }
}
