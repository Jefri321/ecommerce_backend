<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\VendorServices;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    protected $vendorService;

    public function __construct(VendorServices $vendorService)
    {
        $this->vendorService = $vendorService;
    }

    public function index()
    {
        $vendors = $this->vendorService->getAll();
        return view('pages.menu.vendor.index', compact('vendors'));
    }

    public function show($id)
    {
        $vendors = $this->vendorService->getById($id);

        if (!$vendors) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found'
            ], 404);
        }

        // Return partial Blade untuk dimasukkan ke modal
        return view('pages.menu.vendor.component.edit', compact('vendors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'address' => 'nullable|string',
        ]);

        $vendor = $this->vendorService->create($validated);

        return response()->json([
            'success' => true,
            'data'    => $vendor,
            'message' => 'Vendor berhasil ditambahkan!'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'address' => 'nullable|string',
        ]);
        $vendor = $this->vendorService->update($id, $validated);
        return redirect()->route('vendors')
            ->with('success', 'Vendor berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $deleted = $this->vendorService->delete($id);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Vendor berhasil dihapus!'
        ], 200);
    }
}
