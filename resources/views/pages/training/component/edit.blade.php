<div class="relative p-4 w-full max-w-2xl flex flex-col justify-center content-center m-auto  h-screen">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 m-auto w-full">
        <!-- Modal header -->
        <div
            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Edit Training
            </h3>
        </div>

        <!-- Modal body -->
        <div class="space-y-4 w-full h-[500px] overflow-y-scroll">
            <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg">
                <img src="{{ asset('storage/' . $trainings->image) }}" alt="Training Image" />

                <form action="{{ route('training.update', $trainings->id) }}" method="POST" id="formUpdateTraining"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="bg-gray-100 p-2">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image" id="image"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <p class="text-sm text-gray-500 mt-1">Upload gambar untuk training (opsional).</p>

                        <span class="text-red-500 text-sm error-text" id="error-image"></span>

                    </div>


                    <!-- Vendor & Category -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="vendor_id" class="block text-sm font-medium text-gray-700">Vendor</label>
                            <select name="vendor_id" id="vendor_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Select Vendor --</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ ($trainings->vendor_id ?? '') == $vendor->id ? 'selected' : '' }}>
                                        {{ $vendor->name }}
                                    </option>
                                @endforeach
                            </select>

                            <p class="text-sm text-gray-500 mt-1">Pilih vendor yang menyediakan training ini.</p>
                            <span class="text-red-500 text-sm error-text" id="error-vendor_id"></span>

                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category_id" id="category_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $trainings->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-sm text-gray-500 mt-1">Pilih kategori yang sesuai untuk training ini.</p>
                            <span class="text-red-500 text-sm error-text" id="error-category_id"></span>

                        </div>
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            value="{{ $trainings->title }}">
                        <p class="text-sm text-gray-500 mt-1">Masukkan judul training dengan jelas.</p>
                        <span class="text-red-500 text-sm error-text" id="error-title"></span>

                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $trainings->description }}</textarea>
                        <p class="text-sm text-gray-500 mt-1">Berikan deskripsi singkat tentang training.</p>
                        <span class="text-red-500 text-sm error-text" id="error-description"></span>

                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" id="price"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            value="{{ $trainings->price }}">
                        <p class="text-sm text-gray-500 mt-1">Masukkan harga training dalam Rupiah.</p>
                        <span class="text-red-500 text-sm error-text" id="error-price"></span>

                    </div>

                    <!-- Dates & Times -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" name="start_date" id="start_date"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                value="{{ $trainings->start_date }}">
                            <p class="text-sm text-gray-500 mt-1">Tanggal mulai training.</p>
                            <span class="text-red-500 text-sm error-text" id="error-start_date"></span>

                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" name="end_date" id="end_date"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                value="{{ $trainings->end_date }}">
                            <p class="text-sm text-gray-500 mt-1">Tanggal selesai training.</p>
                            <span class="text-red-500 text-sm error-text" id="error-end_date"></span>

                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input type="time" name="start_time" id="start_time"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                value="{{ $trainings->start_time }}">
                            <p class="text-sm text-gray-500 mt-1">Waktu mulai training.</p>
                            <span class="text-red-500 text-sm error-text" id="error-start_time"></span>

                        </div>
                        <div>
                            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                            <input type="time" name="end_time" id="end_time"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                value="{{ $trainings->end_time }}">
                            <p class="text-sm text-gray-500 mt-1">Waktu selesai training.</p>
                            <span class="text-red-500 text-sm error-text" id="error-end_time"></span>

                        </div>
                    </div>

                    <!-- Location & Address -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" name="location" id="location"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            value="{{ $trainings->location }}">
                        <p class="text-sm text-gray-500 mt-1">Tempat training diselenggarakan.</p>
                        <span class="text-red-500 text-sm error-text" id="error-location"></span>

                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea name="address" id="address" rows="2"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $trainings->address }}</textarea>
                        <p class="text-sm text-gray-500 mt-1">Alamat lengkap lokasi training.</p>
                        <span class="text-red-500 text-sm error-text" id="error-address"></span>

                    </div>

                    <!-- Map URL & Image -->
                    <div>
                        <label for="map_url" class="block text-sm font-medium text-gray-700">Map URL</label>
                        <input type="url" name="map_url" id="map_url"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            value="{{ $trainings->map_url }}">
                        <p class="text-sm text-gray-500 mt-1">Link Google Maps lokasi training.</p>
                        <span class="text-red-500 text-sm error-text" id="error-map_url"></span>

                    </div>

                    <select name="status" id="status"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Pilih Status --</option>
                        <option value="0" {{ isset($trainings) && $trainings->status == '0' ? 'selected' : '' }}>
                            Tidak Aktif
                        </option>
                        <option value="1" {{ isset($trainings) && $trainings->status == '1' ? 'selected' : '' }}>
                            Aktif
                        </option>
                    </select>

                    <!-- Submit Button -->
                    <div class="text-right space-x-4">
                        <a href="{{ route('training') }}"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none 
                            bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 
                            focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 
                            dark:hover:text-white dark:hover:bg-gray-700">
                            Back
                        </a>
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-semibold">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
