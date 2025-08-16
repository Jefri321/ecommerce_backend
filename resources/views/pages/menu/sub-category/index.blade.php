<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Category</h1>
            </div>

        </div>

        <div>
            <!-- Main modal -->
            <div id="modal-add-category"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0m   ax-h-full inset-0 bg-black/20 h-screen">
                @include('pages.menu.sub-category.component.add', ['vendors' => $vendors])
            </div>

            <!-- Edit Sub Category modal -->

            <div id="modal-edit-category" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
                <div id="modal-edit-content" class="w-full max-w-2xl"></div>
            </div>

        </div>


        <!-- Cards -->
        <div class="">
            <x-table>
                {{-- Table Head --}}
                <x-slot name="thead">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Vendor</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3 text-end">Action</th>
                    </tr>
                </x-slot>

                {{-- Button Add --}}
                <x-slot name="buttonAdd">
                    <button type="button" id="toggleAdd"
                        class="flex items-center justify-center text-white bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Category
                    </button>
                </x-slot>

                {{-- Button Filter --}}
                <x-slot name="filter">
                    <div id="filterDropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                        <h6 class="mb-3 text-sm font-medium text-gray-900">Training Category</h6>
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-center">
                                <input id="cat-1" type="checkbox" value="1"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:bg-gray-600 dark:border-gray-500">
                                <label for="cat-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    ISO Management
                                </label>
                            </li>
                            <li class="flex items-center">
                                <input id="cat-2" type="checkbox" value="2"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:bg-gray-600 dark:border-gray-500">
                                <label for="cat-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Safety Training
                                </label>
                            </li>
                            <li class="flex items-center">
                                <input id="cat-3" type="checkbox" value="3"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:bg-gray-600 dark:border-gray-500">
                                <label for="cat-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    HR & Leadership
                                </label>
                            </li>
                            <li class="flex items-center">
                                <input id="cat-4" type="checkbox" value="4"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:bg-gray-600 dark:border-gray-500">
                                <label for="cat-4" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Environmental Awareness
                                </label>
                            </li>
                            <li class="flex items-center">
                                <input id="cat-5" type="checkbox" value="5"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:bg-gray-600 dark:border-gray-500">
                                <label for="cat-5" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Quality Assurance
                                </label>
                            </li>
                        </ul>
                    </div>
                </x-slot>

                {{-- Table Body --}}
                @foreach ($categories as $i => $category)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3">{{ $i + 1 }}</td>
                        <td class="px-4 py-3">{{ $category->vendor->name }}</td>
                        <td class="px-4 py-3">{{ $category->name }}</td>
                        <td class="px-4 py-3 text-end space-x-4">
                            <button type="button" class="text-blue-600 hover:underline cursor-pointer"
                                onclick="editCategory(event,{{ $category->id }})">Edit</button>
                            <button type="button" class="text-red-600 hover:underline cursor-pointer"
                                onclick="deleteCategory(event,{{ $category->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </x-table>
        </div>

    </div>

    @push('scripts')
        <script>
            const modalAdd = document.getElementById('modal-add-category');
            const modalEdit = document.getElementById('modal-edit-category');
            const modalEditContent = document.getElementById('modal-edit-content');

            // Tampilkan modal add
            document.getElementById('toggleAdd').addEventListener('click', () => {
                modalAdd.classList.remove('hidden');
            });

            function closeModal(modal) {
                modal.classList.add('hidden');
            }

            function editCategory(event, id) {
                event.preventDefault();

                fetch(`/menu/category/${id}/edit`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'text/html',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => {
                        if (!res.ok) throw new Error(`HTTP error! Status: ${res.status}`);
                        return res.text();
                    })
                    .then(html => {
                        modalEditContent.innerHTML = html;
                        modalEdit.classList.remove('hidden');

                        // Pasang listener submit setelah HTML dimasukkan
                        const form = modalEditContent.querySelector('#formEditCategory');
                        if (!form) return;
                        
                        console.log('Form found:', form);
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();

                            // Hapus pesan error lama
                            form.querySelectorAll('.error-text').forEach(el => el.textContent = '');

                            const formData = new FormData(form);
                            formData.append('_method', 'PUT'); // Laravel PUT

                            fetch(form.action, {
                                    method: 'POST', // tetap POST tapi _method=PUT
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                        'Accept': 'application/json',
                                        'X-Requested-With': 'XMLHttpRequest'
                                    }
                                })
                                .then(async res => {
                                    const data = await res.json();
                                    if (!res.ok) {
                                        // tampilkan error validasi
                                        if (data.errors) {
                                            for (let key in data.errors) {
                                                const errorSpan = form.querySelector(`#error-${key}`);
                                                if (errorSpan) errorSpan.textContent = data.errors[key][0];
                                            }
                                        }
                                        return;
                                    }

                                    // sukses
                                    alert('Category berhasil diperbarui!');
                                    window.location.href = "{{ route('category') }}";
                                })
                                .catch(err => console.error('Update error:', err));
                        });
                    })
                    .catch(err => console.error('Error:', err));
            }

            function deleteCategory(event, id) {
                event.preventDefault();

                if (confirm('Are you sure you want to delete this category?')) {
                    fetch(`/menu/category/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                        .then(res => {
                            if (!res.ok) throw new Error(`HTTP error! Status: ${res.status}`);
                            return res.json();
                        })
                        .then(data => {
                            if (data.success) {
                                alert('Category deleted successfully!');
                                window.location.reload(); // reload page to see changes
                            } else {
                                alert('Failed to delete category.');
                            }
                        })
                        .catch(err => console.error('Error:', err));
                }
            }

        </script>
    @endpush
</x-app-layout>
