<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Assign Role</h1>
            </div>

        </div>

        <!-- Cards -->
        <div class="">
            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3 text-end">Action</th>
                    </tr>
                </x-slot>

                @foreach ($users as $user)
                    <tr class="border-b ">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $user->name }}</td>
                        <th class="px-4 py-3">{{ $user->email }}</th>
                        <th class="px-4 py-3">
                            @if ($user->getRoleNames()->isNotEmpty())
                                {{ $user->getRoleNames()->join(', ') }}
                            @else
                                -
                            @endif
                        </th>
                        <td class="px-4 py-3 text-end cursor-pointer text-blue-600 hover:underline"
                            onclick="editPermission(event, {{ $user->id }})">Edit</td>
                    </tr>
                @endforeach

            </x-table>
        </div>

        <!-- Edit give permission modal -->
        <div id="modal-edit-user" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/50">
            <div id="modal-edit-content" class="w-full max-w-2xl"></div>
        </div>

    </div>

    @push('scripts')
        <script>
            let modalEdit = document.getElementById('modal-edit-user');
            let modalEditContent = document.getElementById('modal-edit-content');
            let selectedRole = null;


            function editPermission(event, id) {
                event.preventDefault();

                fetch(`/controls/assign-role/${id}/edit`, {
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
                        const form = modalEditContent.querySelector('#formEditAssignRole');
                        const role = document.getElementById('role');

                        role.addEventListener('change', function() {
                            selectedRole = role.value;
                            if (selectedRole) {
                                form.querySelector('#error-role').textContent = ''; // clear error
                            } else {
                                form.querySelector('#error-role').textContent = 'Please select a vendor.';
                            }
                        });

                        if (!form) return;

                        form.addEventListener('submit', function(e) {
                            e.preventDefault();

                            // Hapus pesan error lama
                            form.querySelectorAll('.error-text').forEach(el => el.textContent = '');

                            const formData = new FormData(form);
                            formData.append('_method', 'PUT'); // Laravel PUT
                            formData.append('role', selectedRole);

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
                                    window.location.href = "{{ route('assign-role') }}";
                                })
                                .catch(err => console.error('Update error:', err));
                        });
                    })
                    .catch(err => console.error('Error:', err));
            }
        </script>
    @endpush

</x-app-layout>
