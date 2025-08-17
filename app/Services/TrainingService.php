<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Training;
use App\Models\Vendor;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TrainingService
{

    // Ambil semua data
    public function getAll()
    {
        $vendors = Vendor::all();
        $categories = Category::all();
        $trainings = Training::all();

        return [
            'vendors' => $vendors,
            'categories' => $categories,
            'trainings' => $trainings,
        ];
    }

    // Ambil satu data berdasarkan ID
    public function getById(int $id): array
    {
        return [
            'vendors'    => Vendor::all(),
            'categories' => Category::all(),
            'trainings'   => Training::with('vendor')->findOrFail($id),
        ];
    }

    // Buat data baru
    public function create(array $data): Training
    {
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            // simpan file ke storage/app/public/trainings
            $data['image'] = $data['image']->store('trainings', 'public');
        }

        return Training::create($data);
    }

    // Update data
    public function update(int $id, array $data): Training
    {
        $training = Training::findOrFail($id);

        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            // Hapus file lama jika ada
            if ($training->image && Storage::disk('public')->exists($training->image)) {
                Storage::disk('public')->delete($training->image);
            }

            // Simpan file baru
            $data['image'] = $data['image']->store('trainings', 'public');
        }

        $training->update($data);

        return $training;
    }


    // Hapus data
    public function delete(int $id): bool
    {

        $training = Training::findOrFail($id);

        // Hapus file image kalau ada
        if (!empty($training->image) && Storage::disk('public')->exists($training->image)) {
            Storage::disk('public')->delete($training->image);
        }

        return $training->delete();
    }
}
