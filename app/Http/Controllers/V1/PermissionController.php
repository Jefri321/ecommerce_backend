<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\PermissionServices;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionServices;

    public function __construct(PermissionServices $permissionServices)
    {
        $this->permissionServices = $permissionServices;
    }

    public function index()
    {
    $permissions = $this->permissionServices->getAll();

        return view('pages.menagement-control.permission.index', compact('permissions'));
    }

    public function show($id)
    {
        $permission = $this->permissionServices->getById($id);

        if (!$permission) {
            return response()->json([
                'success' => false,
                'message' => 'Permission not found'
            ], 404);
        }

        // Return partial Blade untuk dimasukkan ke modal
        return view('pages.menagement-control.permission.component.edit', compact('permission'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'name'       => 'required|string|max:255',
        'guard_name' => 'nullable|string|max:255',
    ]);

    try {
        $permission = $this->permissionServices->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Permission created successfully',
            'data'    => $permission
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'errors' => $e->getMessage()
        ], 400);
    }
}


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'guard_name' => 'string|max:255',
        ]);

        $permission = $this->permissionServices->update($id, $validated);

        return response()->json([
            'success' => true,
            'data'    => $permission,
            'message' => 'Permission berhasil diperbarui!'
        ]);
    }

    public function destroy($id)
    {
        $deleted = $this->permissionServices->delete($id);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Permission not found or could not be deleted'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Permission berhasil dihapus!'
        ]);
    }
}
