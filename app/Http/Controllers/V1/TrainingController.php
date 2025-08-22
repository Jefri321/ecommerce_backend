<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\TrainingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    protected $trainingService;

    public function __construct(TrainingService $trainingService)
    {
        $this->trainingService = $trainingService;
    }

    // Tampilkan semua training
    public function index()
    {
        $data = $this->trainingService->getAll();

        // Mengirim langsung variabel ke view
        return view('pages.training.index', [
            'trainings' => $data['trainings'],
            'vendors' => $data['vendors'],
            'categories' => $data['categories'],
        ]);
    }

    // Form create
    public function create()
    {
        return view('trainings.create');
    }

    // Simpan training baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i|after:start_time',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'vendor_id'   => 'required|exists:vendors,id',
            'category_id' => 'required|exists:categories,id',
            'map_url'     => 'nullable|url',
            'address'     => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
        ]);

        $this->trainingService->create($validated);
       
        return response()->json([
            'status' =>true,
            'data' => []
        ]);
    }

    // Form edit
    public function show(int $id)
    {
        $data = $this->trainingService->getById($id);

        // Mengirim langsung variabel ke view
        return view('pages.training.component.edit', [
            'trainings' => $data['trainings'],
            'vendors' => $data['vendors'],
            'categories' => $data['categories'],
        ]);
    }

    // Update training
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'start_time'  => 'required|date_format:H:i:s',
            'end_time'    => 'required|date_format:H:i:s|after:start_time',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'vendor_id'   => 'required|exists:vendors,id',
            'category_id' => 'required|exists:categories,id',
            'map_url'     => 'nullable|url',
            'address'     => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
            'status'      => 'required|integer|in:0,1'
        ]);

        // pastikan status '0' tetap terbaca
        $validated['status'] = (int) $request->input('status');

        $trainings = $this->trainingService->update($id, $validated);

        return response()->json($trainings, 200);
    }

    // Hapus training
    public function destroy(int $id)
    {
        try {
            $deleted = $this->trainingService->delete($id);

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Training deleted successfully.'
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Training not found or could not be deleted.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting training: ' . $e->getMessage()
            ], 500);
        }
    }
}
