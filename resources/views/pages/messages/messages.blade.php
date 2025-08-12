<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Messages</h1>
            </div>
        </div>
        
        <!-- Cards -->
        <div class="">
            <!-- awalnya disembunyikan -->
            <div id="messagesBox" class="hidden">
                <x-messages/>
            </div>

            <div id="tableMassages">
                 <x-table>
                
                <!-- Button Add Category -->
                <x-slot name="buttonAdd" >
                    <button type="button" id="showMessagesBtn" class="flex items-center justify-center text-white bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 cursor-pointer z-50">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Create messages
                    </button>
                </x-slot>
                
                <x-slot name="thead">
                    <tr>
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">Subject</th>
            <th class="px-4 py-3">Tanggal Dihubungi</th>
        </tr>
                </x-slot>
<tr class="font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">1</td>
            <td class="px-4 py-3">john.doe@example.com</td>
            <td class="px-4 py-3">Permintaan Informasi Pelatihan IT</td>
            <td class="px-4 py-3">2025-08-05</td>
        </tr>
        <tr class="font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">2</td>
            <td class="px-4 py-3">jane.smith@example.com</td>
            <td class="px-4 py-3">Negosiasi Harga Pelatihan</td>
            <td class="px-4 py-3">2025-08-06</td>
        </tr>
        <tr class="font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">3</td>
            <td class="px-4 py-3">michael.brown@example.com</td>
            <td class="px-4 py-3">Follow Up Training Karyawan</td>
            <td class="px-4 py-3">2025-08-08</td>
        </tr>
        <tr class="font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">4</td>
            <td class="px-4 py-3">anna.wilson@example.com</td>
            <td class="px-4 py-3">Permintaan Jadwal Pelatihan</td>
            <td class="px-4 py-3">2025-08-09</td>
        </tr>
            </x-table>
            </div>
           
        </div>

    </div>

    @push('scripts')
    <script>    
        document.getElementById('showMessagesBtn').addEventListener('click', function() {
            let box = document.getElementById('messagesBox');
            box.classList.toggle('hidden');

            let tableMassages = document.getElementById('tableMassages');
            tableMassages.classList.add('hidden');
        });
    </script>
    @endpush


</x-app-layout>

