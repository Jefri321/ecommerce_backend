<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleServices
{

    public function getAll()
    {
        return Role::with(['permissions'])->get();
    }

    public function create(array $data)
    {
        // Pastikan nama role tidak duplikat untuk guard web
        if (Role::where('name', $data['name'])
            ->where('guard_name', $data['guard_name'] ?? 'web')
            ->exists()
        ) {
            throw new \Exception('Role with this name already exists.');
        }

        // Buat role
        $role = Role::create([
            'name'       => $data['name'],
            'guard_name' => $data['guard_name'] ?? 'web',
        ]);

        // Sync permissions jika ada
        if (!empty($data['permissions']) && is_array($data['permissions'])) {
            // Konversi id -> name
            $permissionNames = Permission::whereIn('id', $data['permissions'])
                ->pluck('name')
                ->toArray();

            $role->syncPermissions($permissionNames);
        }

        return $role->load('permissions'); // load permissions supaya controller langsung dapat
    }

    public function getById(int $id)
    {
        return Role::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        // Ambil role asli
        $role = Role::findOrFail($id);

        // Update nama role jika ada
        if (isset($data['name'])) {
            $role->name = $data['name'];
            $role->save();
        }

        // Sync permissions jika disertakan
        if (isset($data['permissions']) && is_array($data['permissions'])) {
            // Ambil nama permission dari id
            $permissionNames = Permission::whereIn('id', $data['permissions'])
                ->pluck('name')
                ->toArray();

            $role->syncPermissions($permissionNames);
        }

        return $role->load('permissions'); // return role beserta permissions
    }


    public function delete(int $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return false;
        }

        // Hapus pivot tanpa panggil relasi users()
        \DB::table('model_has_roles')->where('role_id', $role->id)->delete();
        \DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

        return $role->delete();
    }
}
