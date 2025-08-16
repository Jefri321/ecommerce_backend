<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserServices
{

    public function getAll()
    {
        return User::with(['roles', 'permissions'])->get();
    }

    public function create(array $data)
    {
        // pastikan password di-hash
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return User::create($data);
    }

    public function getById(int $id)
    {
        return User::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $product = User::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id)
    {
        $product = User::findOrFail($id);
        return $product->delete();
    }
}
