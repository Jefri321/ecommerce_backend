<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Give Permission</h1>
            </div>

        </div>
        
        <!-- Cards -->
        <div class="">
            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3 text-end">Action</th>
                    </tr>
                </x-slot>

                <tr class="border-b dark:border-gray-700">
                 
                    <td class="px-4 py-3">1</td>
                    <td class="px-4 py-3">putra@gmail.com</td>
                    <th class="px-4 py-3">Admin</th>
                    <td class="px-4 py-3 text-end cursor-pointer" onclick="editPermission()">Edit</td>
                </tr>
            
            </x-table>
        </div>

        <!-- Edit give permission modal -->
        <div id="modal-edit-permission" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  max-h-full inset-0 bg-black/20 h-screen">
            @include('pages.menagement-control.give-permission.component.edit', ['userFind' => '$userFind'])
        </div>
        
    </div>

    @push('scripts')
        <script>
            
            function editPermission(id) {
                document.getElementById('modal-edit-permission').classList.remove('hidden');
            }

        </script>
    @endpush

</x-app-layout>
