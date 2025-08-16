<?php

namespace App\Services;

use App\Models\Category;

class CategoriesService{
    
    public function getAll()
    {
        return Category::with('vendor')->get();
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(int $id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete(int $id)
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }

    public function getById(int $id)
    {
        return Category::with('vendor')->findOrFail($id);
    }
}
