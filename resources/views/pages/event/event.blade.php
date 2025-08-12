<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Pelatihan</h1>
            </div>

        </div>
        
        <!-- Cards -->
        <div class="">
          <x-table>
            <!-- Button Add Category -->
            <x-slot name="buttonAdd">
                <button type="button" id="createProductModalButton" data-modal-target="createProductModal" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add Pelatihan
                </button>
            </x-slot>
            
             <x-slot name="thead">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Pelatihan</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Tanggal</th>
                     <th class="px-4 py-3">Status   </th>
                    <th class="px-4 py-3 text-end">Aksi</th>
                </tr>
            </x-slot>
            @for ($i = 1; $i <= 10; $i++)
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">{{ $i }}</td>
                <td class="px-4 py-3">Pelatihan {{ $i }}</td>
                <td class="px-4 py-3">Kategori {{ ['Musik', 'Olahraga', 'Seminar', 'Pameran'][$i % 4] }}</td>
                <td class="px-4 py-3">Rp {{ number_format(50000 + ($i * 15000), 0, ',', '.') }}</td>
                <td class="px-4 py-3">{{ \Carbon\Carbon::now()->subDays($i)->format('d M Y') }}</td>
                <td class="px-4 py-3">Aktif</td>
                <td class="px-4 py-3 text-end">
                    <a href="#" class="text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            @endfor

          </x-table>


        </div>

    </div>
</x-app-layout>
