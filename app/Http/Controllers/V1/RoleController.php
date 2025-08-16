<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\RoleServices;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    protected $roleServices;

    public function __construct(RoleServices $roleServices)
    {
        $this->roleServices = $roleServices;
    }

    public function index()
    {
        $roles = $this->roleServices->getAll();
        $permissions = Permission::all();

        return view('pages.menagement-control.role.index', compact('roles', 'permissions'));
    }

    public function show($id)
    {
        $role = $this->roleServices->getById($id);
        $permissions = Permission::all();

        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found'
            ], 404);
        }

        // Return partial Blade untuk dimasukkan ke modal
        return view('pages.menagement-control.role.component.edit', compact('role', 'permissions'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id', // pastikan id permission valid
        ]);

        // Buat role via service (langsung sync permissions di service)
        $role = $this->roleServices->create($validated);

        return response()->json([
            'success' => true,
            'data'    => $role, // service sudah load permissions
            'message' => 'Role berhasil ditambahkan!'
        ], 201);
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = $this->roleServices->update($id, [
            'name' => $validated['name'],
            'permissions' => $validated['permissions'] ?? [],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Role updated successfully',
            'role' => $role->load('permissions')
        ], 200);
    }


    public function destroy($id)
    {
        $deleted = $this->roleServices->delete($id);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Role deleted successfully'
        ], 200);
    }
}
