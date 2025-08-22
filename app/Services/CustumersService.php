<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Customer;

class CategoriesService{
    
    public function getAll()
    {
        return Customer::with('vendor')->get();
    }

    public function create(array $data)
    {
        return Customer::create($data);
    }

    public function update(int $id, array $data)
    {
        $category = Customer::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete(int $id)
    {
        $category = Customer::findOrFail($id);
        return $category->delete();
    }

    public function getById(int $id)
    {
        return Customer::with('vendor')->findOrFail($id);
    }
}