<?php

namespace App\Services;

use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;

class VendorServices
{

    public function getAll()
    {
        return Vendor::all();
    }

    public function create(array $data)
    {
     return Vendor::create($data);
    }

    public function getById(int $id)
    {
        return Vendor::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $product = Vendor::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id)
    {
        $product = Vendor::findOrFail($id);
        return $product->delete();
    }
}
