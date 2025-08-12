<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Users</h1>
            </div>
        </div>
        
        <div>    
            <!-- Main modal -->
            <div id="modal-add-user" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0m   ax-h-full inset-0 bg-black/20 h-screen">
                @include('pages.menagement-control.user.component.add')
            </div>

            <!-- Edit User modal -->
            <div id="modal-edit-user" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  max-h-full inset-0 bg-black/20 h-screen">
              @include('pages.menagement-control.user.component.edit', ['userFind' => '$userFind'])
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
                    Add Users
                </button>
            </x-slot>
            
            <!-- Button Filter -->
            <x-slot name="filter">
                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                    </svg>
                    Filter
                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
                <div id="filterDropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                    <h6 class="mb-3 text-sm font-medium text-gray-900 ">Category</h6>
                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                        <li class="flex items-center">
                            <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple (56)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Fitbit (56)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="dell" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="dell" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Dell (56)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="asus" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Asus (97)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="logitech" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="logitech" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Logitech (97)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="msi" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="msi" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">MSI (97)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="bosch" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="bosch" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Bosch (176)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="sony" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="sony" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Sony (234)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="samsung" type="checkbox" value="" checked="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="samsung" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Samsung (76)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="canon" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="canon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Canon (49)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="microsoft" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="microsoft" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Microsoft (45)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="razor" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="razor" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Razor (49)</label>
                        </li>
                    </ul>
                </div>
            </x-slot>

                <x-slot name="thead">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Permissions</th>
                        <th class="px-4 py-3">Created At</th>
                        <th class="px-4 py-3 text-end">Action</th>
                    </tr>
                </x-slot>

                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Alice Johnson</th>
                    <td class="px-4 py-3">Admin</td>
                    <td class="px-4 py-3">Create, Edit, Delete</td>
                    <td class="px-4 py-3">2025-08-01</td>
                    <td class="px-4 py-3 text-end space-x-2">
                        <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                        <button command="show-modal" commandfor="dialog" class="text-red-600 cursor-pointer">Delete</button>
                    </td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Bob Smith</th>
                    <td class="px-4 py-3">Editor</td>
                    <td class="px-4 py-3">Create, Edit</td>
                    <td class="px-4 py-3">2025-07-28</td>
                    <td class="px-4 py-3 text-end space-x-2">
                    <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                    <button command="show-modal" commandfor="dialog" class="text-red-600 cursor-pointer">Delete</button>
                    </td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Clara Lee</th>
                    <td class="px-4 py-3">Viewer</td>
                    <td class="px-4 py-3">View Only</td>
                    <td class="px-4 py-3">2025-06-21</td>
                    <td class="px-4 py-3 text-end space-x-2">
                    <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                    <button command="show-modal" commandfor="dialog" class="text-red-600 cursor-pointer">Delete</button>
                    </td>

                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Daniel Chan</th>
                    <td class="px-4 py-3">Admin</td>
                    <td class="px-4 py-3">All Access</td>
                    <td class="px-4 py-3">2025-04-30</td>
                    <td class="px-4 py-3 text-end space-x-2">
                    <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                    <button command="show-modal" commandfor="dialog" class="text-red-600 cursor-pointer">Delete</button>
                    </td>

                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Eva Green</th>
                    <td class="px-4 py-3">Support</td>
                    <td class="px-4 py-3">Reply Tickets</td>
                    <td class="px-4 py-3">2025-03-19</td>
                    <td class="px-4 py-3 text-end space-x-2">
                    <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                    <button command="show-modal" commandfor="dialog" class="text-red-600 cursor-pointer">Delete</button>
                    </td>

                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Felix Ng</th>
                    <td class="px-4 py-3">Editor</td>
                    <td class="px-4 py-3">Edit Content</td>
                    <td class="px-4 py-3">2025-02-11</td>
                    <td class="px-4 py-3 text-end space-x-2">
                    <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                    <button command="show-modal" commandfor="dialog" class="text-red-600 cursor-pointer">Delete</button>
                    </td>

                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Grace Lim</th>
                    <td class="px-4 py-3">Viewer</td>
                    <td class="px-4 py-3">Read Only</td>
                    <td class="px-4 py-3">2025-01-08</td>
                    <td class="px-4 py-3 text-end space-x-2">
                    <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                    <button command="show-modal" commandfor="dialog" class="text-red-600 cursor-pointer">Delete</button>
                    </td>

                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Henry Ford</th>
                    <td class="px-4 py-3">Manager</td>
                    <td class="px-4 py-3">Approve, Assign</td>
                    <td class="px-4 py-3">2024-12-15</td>
                    <td class="px-4 py-3 text-end space-x-2">
                    <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                    <button command="show-modal" commandfor="dialog" class="text-red-600 cursor-pointer">Delete</button>
                    </td>

                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Isabel Cruz</th>
                    <td class="px-4 py-3">Support</td>
                    <td class="px-4 py-3">Respond</td>
                    <td class="px-4 py-3">2024-11-25</td>
                    <td class="px-4 py-3 text-end space-x-2">
                    <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                    <button command="show-modal" commandfor="dialog" class="text-red-600 cursor-pointer">Delete</button>
                    </td>

                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Jack Ma</th>
                    <td class="px-4 py-3">Admin</td>
                    <td class="px-4 py-3">All Permissions</td>
                    <td class="px-4 py-3">2024-10-30</td>
                    <td class="px-4 py-3 text-end space-x-2">
                    <button onclick="editUser(1)" class="text-blue-600 cursor-pointer">Edit</button>
                    <button command="show-modal" commandfor="dialog" class="text-red-600 hover:underline">Delete</button>
                    </td>

                </tr>
            </x-table>
        </div>

    </div>

    <!-- Confirm Delete  -->
    <dialog id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 bg-black/20  size-auto max-h-none max-w-none overflow-y-auto  backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed "></el-dialog-backdrop>

        <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
        <el-dialog-panel class="relative overflow-hidden rounded-lg bg-white text-left shadow-xl sm:my-8 sm:w-full sm:max-w-lg ">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-red-600">
                    <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 id="dialog-title" class="text-base font-semibold text-gray-900">Delete account</h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
                </div>
                </div>
            </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="button" command="close" commandfor="dialog" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
            <button type="button" command="close" commandfor="dialog" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
            </div>
        </el-dialog-panel>
        </div>
    </dialog>
    </el-dialog>


    @push('scripts')
        <script>
            let toggleAdd = document.getElementById('toggleAdd');
            let modalAddUser =  document.getElementById('modal-add-user');
            
            toggleAdd.addEventListener('click', function() {
                  modalAddUser.classList.remove('hidden');
            })
            
            function editUser(id) {
                document.getElementById('modal-edit-user').classList.remove('hidden');
            }

        </script>
    @endpush
</x-app-layout>
