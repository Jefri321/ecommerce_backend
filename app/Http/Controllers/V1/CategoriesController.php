<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\CategoriesService;
use App\Services\VendorServices;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoryService, $vendorService;

    public function __construct(CategoriesService $categoryService, VendorServices $vendorService)
    {
        $this->categoryService = $categoryService;
        $this->vendorService = $vendorService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        $vendors = $this->vendorService->getAll();
        return view('pages.menu.sub-category.index', compact('categories', 'vendors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required|string|max:255',
        ]);

        $category = $this->categoryService->create($validated);
        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required|string|max:255',
        ]);

        $category = $this->categoryService->update($id, $validated);
        return response()->json($category, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->categoryService->delete($id);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Vendor not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'category berhasil dihapus!'
        ], 200);
    }

    public function show(int $id)
    {
        $category = $this->categoryService->getById($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $vendors = $this->vendorService->getAll();

        return view('pages.menu.sub-category.component.edit', compact('category', 'vendors'));
    }
}
