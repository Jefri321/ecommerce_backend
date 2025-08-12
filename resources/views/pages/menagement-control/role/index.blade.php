<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Role</h1>
            </div>

        </div>

        <div>    
            <!-- Main modal -->
            <div id="modal-add-role" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0m   ax-h-full inset-0 bg-black/20 h-screen">
                @include('pages.menagement-control.role.component.add')
            </div>

            <!-- Edit role modal -->
            <div id="modal-edit-role" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  max-h-full inset-0 bg-black/20 h-screen">
              @include('pages.menagement-control.role.component.edit', ['userFind' => '$userFind'])
            </div>

        </div>
        
        <!-- Cards -->
        <div class="">
            <x-table>
                
                <!-- Button Add Category -->
                <x-slot name="buttonAdd">
                    <button type="button" id="toggleAdd" data-modal-target="createProductModal" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Role
                    </button>
                </x-slot>
            
                <x-slot name="thead">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Permissions</th>
                        <th class="px-4 py-3 text-end">Action</th>
                    </tr>
                </x-slot>

                <tr class="border-b dark:border-gray-700">
                 
                    <td class="px-4 py-3">Admin</td>
                    <td class="px-4 py-3">Create, Edit, Delete</td>
                    <td class="px-4 py-3 text-end cursor-pointer" onclick="editRole(1)">Edit</td>
                </tr>
            
            </x-table>
        </div>

    </div>

       @push('scripts')
        <script>
            let toggleAdd = document.getElementById('toggleAdd');
            let modalAddUser =  document.getElementById('modal-add-role');
            
            toggleAdd.addEventListener('click', function() {
                  modalAddUser.classList.remove('hidden');
            })
            
            function editRole(id) {
                document.getElementById('modal-edit-role').classList.remove('hidden');
            }

        </script>
    @endpush

</x-app-layout>
