<x-app-layout>





    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Vendors</h1>
            </div>
        </div>

        <!-- Modals -->
        <div>
            <!-- Add Vendor Modal -->
            <div id="modal-add-category" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
                @include('pages.menu.vendor.component.add')
            </div>

            <!-- Edit Vendor Modal -->
            <div id="modal-edit-category"
                class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
                <div id="modal-edit-content" class="w-full max-w-2xl"></div>
            </div>
        </div>

        <!-- Table -->
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">No. Telepon</th>
                    <th class="px-4 py-3">Alamat</th>
                    <th class="px-4 py-3 text-end">Aksi</th>
                </tr>
            </x-slot>

            <x-slot name="buttonAdd">
                <button type="button" id="toggleAdd"
                    class="flex items-center justify-center text-white bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add Vendor
                </button>
            </x-slot>

            @foreach ($vendors as $i => $vendor)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">{{ $i + 1 }}</td>
                    <td class="px-4 py-3">{{ $vendor->name }}</td>
                    <td class="px-4 py-3">{{ $vendor->email }}</td>
                    <td class="px-4 py-3">{{ $vendor->phone }}</td>
                    <td class="px-4 py-3">{{ $vendor->address }}</td>
                    <td class="px-4 py-3 text-end space-x-4">
                        <button type="button" class="text-blue-600 hover:underline"
                            onclick="editVendor({{ $vendor->id }})">Edit</button>
                        <button type="button" class="text-red-600 hover:underline"
                            onclick="deleteVendor({{ $vendor->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </x-table>

    </div>

    @push('scripts')
        <script>
            const modalAdd = document.getElementById('modal-add-category');
            const modalEdit = document.getElementById('modal-edit-category');
            const modalEditContent = document.getElementById('modal-edit-content');

            document.getElementById('toggleAdd').addEventListener('click', () => {
                modalAdd.classList.remove('hidden');
            });

            function closeModal(modal) {
                modal.classList.add('hidden');
            }

            function editVendor(id) {
                fetch(`/menu/vendor/${id}/edit`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'text/html',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => {
                        if (!res.ok) throw new Error(`HTTP error! Status: ${res.status}`);
                        return res.text(); // langsung ambil HTML
                    })
                    .then(html => {
                        if (modalEdit) {
                            modalEditContent.innerHTML = html;
                            modalEdit.classList.remove('hidden');
                        }

                    })
                    .catch(err => console.error('Error:', err));
            }


            function deleteVendor(id) {
                if (confirm('Are you sure you want to delete this vendor?')) {
                    fetch(`/menu/vendor/${id}`, {
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
                                location.reload(); // reload page to see changes
                            } else {
                                alert('Failed to delete vendor.');
                            }
                        })
                        .catch(err => console.error('Error:', err));
                }
            }
        </script>
    @endpush
</x-app-layout>
