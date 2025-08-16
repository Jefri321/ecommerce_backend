<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionServices
{
    public function getAll()
    {
        return Permission::all(); // Permission tidak punya relasi 'permissions'
    }

    public function create(array $data)
    {
        // pastikan nama permission tidak duplikat untuk guard tertentu
        if (Permission::where('name', $data['name'])
            ->where('guard_name', $data['guard_name'] ?? 'web')
            ->exists()
        ) {
            throw new \Exception('Permission with this name already exists.');
        }

        return Permission::create([
            'name'       => $data['name'],
            'guard_name' => $data['guard_name'] ?? 'web', // default guard
        ]);
    }

    public function getById(int $id)
    {
        return Permission::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($data);
        return $permission;
    }

    public function delete(int $id)
    {
        $permission = Permission::find($id);

        if (!$permission) {
            return false;
        }

        // Hapus pivot: permission <-> role & permission <-> model
        DB::table('role_has_permissions')->where('permission_id', $permission->id)->delete();
        DB::table('model_has_permissions')->where('permission_id', $permission->id)->delete();

        return $permission->delete();
    }
}
