<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\RoleServices;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    protected $userServices, $roleServices;

    public function __construct(UserServices $userServices, RoleServices $roleServices)
    {
        $this->userServices = $userServices;
        $this->roleServices = $roleServices;
    }

    public function index()
    {

        $users = $this->userServices->getAll();

        return view('pages.menagement-control.user.index', compact('users'));
    }

    public function show($id)
    {
        $users = $this->userServices->getById($id);

        if (!$users) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found'
            ], 404);
        }

        // Return partial Blade untuk dimasukkan ke modal
        return view('pages.menagement-control.user.component.edit', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $users = $this->userServices->create($validated);

        return response()->json([
            'success' => true,
            'data'    => $users,
            'message' => 'user berhasil ditambahkan!'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
        ]);
        $users = $this->userServices->update($id, $validated);
        return response()->json($users, 200);
    }

    public function destroy($id)
    {
        $this->userServices->delete($id);
        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ], 200);
    }

    public function assignRolePage()
    {
        $users = $this->userServices->getAll();
        return view('pages.menagement-control.assign-role.index', compact('users'));
    }

    public function assignRoleView($id)
    {
        $users = $this->userServices->getById($id);
        $roles = $this->roleServices->getAll();
        if (!$users) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found'
            ], 404);
        }

        // Return partial Blade untuk dimasukkan ke modal
        return view('pages.menagement-control.assign-role.component.edit', compact('users', 'roles'));
    }

    public function assignRoleDestroy($id)
    {
        $users = $this->userServices->getById($id);
    }

    public function assignRoleUpdate(Request $request, $id)
    {
        $user = $this->userServices->getById($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        $validated = $request->validate([
            'role' => 'required|exists:roles,name', // pastikan role valid
        ]);

        // Remove all previous roles (opsional)
        $user->syncRoles([$validated['role']]);

        return response()->json([
            'success' => true,
            'message' => 'Role assigned successfully',
            'user' => $user
        ]);
    }
}
