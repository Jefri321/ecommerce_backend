<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Training</h1>
            </div>

            <!-- Modals -->
            <div>
                <!-- Add Vendor Modal -->
                <div id="modal-add-category"
                    class="hidden fixed inset-0 z-50 flex justify-center items-center overflow-y-scroll bg-black/50">
                    @include('pages.training.component.add')
                </div>

                <!-- Edit Vendor Modal -->
                <div id="modal-edit-category"
                    class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
                    <div id="modal-edit-content" class="w-full max-w-2xl"></div>
                </div>
            </div>

        </div>

        <!-- Cards -->
        <div class="">
            <x-table>
                <!-- Button Add Category -->
                <x-slot name="buttonAdd">
                    <button type="button" id="toggleAdd" data-modal-toggle="createProductModal"
                        class="flex items-center justify-center text-white bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Training
                    </button>
                </x-slot>

                <x-slot name="thead">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Pelatihan</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Harga</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Status </th>
                        <th class="px-4 py-3 text-end">Aksi</th>
                    </tr>
                </x-slot>
                @foreach ($trainings as $training)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $training->title }}</td>
                        <td class="px-4 py-3">
                            {{ $training->category->name ?? 'Tidak ada kategori' }}
                        </td>
                        <td class="px-4 py-3">
                            Rp {{ number_format($training->price ?? 0, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::parse($training->start_date ?? now())->format('d M Y') }}
                        </td>
                        <td class="px-4 py-3"> {{ $training->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td class="px-4 py-3 text-end space-x-4">
                            <button type="button" class="text-blue-600 hover:underline"
                                onclick="editTraining(event,{{ $training->id }})">Edit</button>
                            <button command="show-modal" commandfor="dialog"
                                class="text-red-600 cursor-pointer">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>

    <!-- Confirm Delete  -->
    <dialog id="dialog" aria-labelledby="dialog-title"
        class="fixed inset-0 bg-black/20  size-auto max-h-none max-w-none overflow-y-auto  backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed "></el-dialog-backdrop>

        <div tabindex="0"
            class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
            <el-dialog-panel
                class="relative overflow-hidden rounded-lg bg-white text-left shadow-xl sm:my-8 sm:w-full sm:max-w-lg ">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6 text-red-600">
                                <path
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 id="dialog-title" class="text-base font-semibold text-gray-900">Delete Training</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All
                                    of your data will be permanently removed. This action cannot be undone.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <!-- Tombol Deactivate -->
                        <button type="button" command="close" commandfor="dialog"
                            data-user-id="{{ $training->id ?? '' }}"
                            onclick="deleteTraining(this.getAttribute('data-user-id'))"
                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 
               text-sm font-semibold text-white shadow-sm hover:bg-red-500 
               sm:ml-3 sm:w-auto">
                            Delete
                        </button>

                        <!-- Tombol Cancel -->
                        <button type="button" command="close" commandfor="dialog"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 
               text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-gray-300 
               hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            Cancel
                        </button>
                    </div>

                </div>
            </el-dialog-panel>
        </div>

        </el-dialog>
    </dialog>



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

            function editTraining(event, id) {
                event.preventDefault();
                fetch(`/training/${id}/edit`, {
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

                            // Pasang listener submit setelah HTML dimasukkan
                            const form = modalEditContent.querySelector('#formUpdateTraining');
                            if (!form) return;

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
                                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')
                                                .value,
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
                                                    if (errorSpan) errorSpan.textContent = data.errors[key][
                                                        0
                                                    ];
                                                }
                                            }
                                            return;
                                        }

                                        // sukses
                                        alert('Training berhasil diperbarui!');
                                        window.location.href = "{{ route('training') }}";
                                    })
                                    .catch(err => console.error('Update error:', err));
                            });
                        }

                    })
                    .catch(err => console.error('Error:', err));
            }

            function deleteTraining(id) {
                fetch(`/training/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('User deleted successfully');
                            location.reload();
                        } else {
                            alert('Error deleting user');
                        }
                    })
                    .catch(error => console.error('Error deleting user:', error));
            }
        </script>
    @endpush
</x-app-layout>
