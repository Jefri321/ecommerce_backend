<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Vendors</h1>
            </div>

        </div>

        <div>    
            <!-- Main modal -->
            <div id="modal-add-category" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0m   ax-h-full inset-0 bg-black/20 h-screen">
                @include('pages.menu.category.component.add')
            </div>

            <!-- Edit Sub Category modal -->
            <div id="modal-edit-category" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  max-h-full inset-0 bg-black/20 h-screen">
              @include('pages.menu.category.component.edit')
            </div>

        </div>
        
        <!-- Cards -->
        <div class="">
          <x-table>
             <x-slot name="thead">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                   
                    <th class="px-4 py-3 text-end">Aksi</th>
                </tr>
            </x-slot>

            <!-- Button Add Category -->
            <x-slot name="buttonAdd">
                <button type="button" id="toggleAdd" class="flex items-center justify-center text-white bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add Vendor
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
                    <h6 class="mb-3 text-sm font-medium text-gray-900 ">Vendors</h6>
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
            
            @for ($i = 1; $i <= 8; $i++)
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">{{ $i }}</td>
                <td class="px-4 py-3">Category {{ $i }}</td>
                <td class="px-4 py-3 text-end">
                    <a href="#" class="text-blue-600 hover:underline" onClick="editCategory()">Edit</a>
                </td>
            </tr>
            @endfor

          </x-table>

        </div>

    </div>

    
    @push('scripts')
       <script>
            let toggleAdd = document.getElementById('toggleAdd');
            let modalAddUser =  document.getElementById('modal-add-category');
            
            toggleAdd.addEventListener('click', function() {
                  modalAddUser.classList.remove('hidden');
            })
            
            function editCategory(id) {
                document.getElementById('modal-edit-category').classList.remove('hidden');
            }

        </script>
    @endpush
</x-app-layout>
