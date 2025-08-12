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
            <div id="modal-add-sub"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0m   ax-h-full inset-0 bg-black/20 h-screen">
                @include('pages.menu.sub-category.component.add')
            </div>

            <!-- Edit Sub Category modal -->
            <div id="modal-edit-sub"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  max-h-full inset-0 bg-black/20 h-screen">
                @include('pages.menu.sub-category.component.edit')
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
                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-primary-700 focus:outline-none focus:z-10 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                clip-rule="evenodd" />
                        </svg>
                        Filter
                        <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
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
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">1</td>
                    <td class="px-4 py-3">PT Mitra Karya</td>
                    <td class="px-4 py-3">ISO Management</td>
                    <td class="px-4 py-3 text-end">
                        <a href="#" class="text-blue-600 hover:underline" onclick="editCategory(1)">Edit</a>
                    </td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">2</td>
                    <td class="px-4 py-3">PT Safety First</td>
                    <td class="px-4 py-3">Safety Training</td>
                    <td class="px-4 py-3 text-end">
                        <a href="#" class="text-blue-600 hover:underline" onclick="editCategory(2)">Edit</a>
                    </td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">3</td>
                    <td class="px-4 py-3">PT Green Earth</td>
                    <td class="px-4 py-3">Environmental Awareness</td>
                    <td class="px-4 py-3 text-end">
                        <a href="#" class="text-blue-600 hover:underline" onclick="editCategory(3)">Edit</a>
                    </td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">4</td>
                    <td class="px-4 py-3">PT Human Capital</td>
                    <td class="px-4 py-3">HR & Leadership</td>
                    <td class="px-4 py-3 text-end">
                        <a href="#" class="text-blue-600 hover:underline" onclick="editCategory(4)">Edit</a>
                    </td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">5</td>
                    <td class="px-4 py-3">PT Audit Pro</td>
                    <td class="px-4 py-3">Quality Assurance</td>
                    <td class="px-4 py-3 text-end">
                        <a href="#" class="text-blue-600 hover:underline" onclick="editCategory(5)">Edit</a>
                    </td>
                </tr>


            </x-table>


        </div>

    </div>

    @push('scripts')
        <script>
            let toggleAdd = document.getElementById('toggleAdd');
            let modalAddUser = document.getElementById('modal-add-sub');

            toggleAdd.addEventListener('click', function() {
                modalAddUser.classList.remove('hidden');
            })

            function editCategory(id) {
                document.getElementById('modal-edit-sub').classList.remove('hidden');
            }
        </script>
    @endpush
</x-app-layout>
