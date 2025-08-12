<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Menagement Client</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Filter button -->
                <x-dropdown-filter align="right" />

                <!-- Datepicker built with flatpickr -->
                <x-datepicker />

                <!-- Add view button -->
                <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                  </svg>
                  <span class="max-xs:sr-only">Add View</span>
                </button>
                
            </div>

        </div>
        
        <!-- Cards -->
        <div class="">
            <x-table>
                <x-slot name="thead">
                    <tr>
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">CLIENT</th>
            <th class="px-4 py-3">PELATIHAN</th>
            <th class="px-4 py-3">SALES</th>
            <th class="px-4 py-3">PRICE</th>
            <th class="px-4 py-3">STATUS PEMBAYARAN</th>
            <th class="px-4 py-3">TGL DEAL</th>
            <th class="px-4 py-3"></th>
        </tr>
                </x-slot>

               <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">1</td>
            <td class="px-4 py-3">PT. Maju Jaya</td>
            <td class="px-4 py-3">Pemrograman Web dengan Laravel</td>
            <td class="px-4 py-3">Budi Santoso</td>
            <td class="px-4 py-3">Rp 1.500.000</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-green-700/20 text-green-500 rounded text-xs">Paid</span></td>
            <td class="px-4 py-3">2025-08-05</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
        <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">2</td>
            <td class="px-4 py-3">CV. Digital Kreatif</td>
            <td class="px-4 py-3">Digital Marketing & SEO</td>
            <td class="px-4 py-3">Siti Rahmawati</td>
            <td class="px-4 py-3">Rp 1.200.000</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-yellow-700/20 text-yellow-500 rounded text-xs">Pending</span></td>
            <td class="px-4 py-3">2025-08-07</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
        <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">3</td>
            <td class="px-4 py-3">PT. Solusi Mandiri</td>
            <td class="px-4 py-3">Public Speaking & Presentasi</td>
            <td class="px-4 py-3">Andi Pratama</td>
            <td class="px-4 py-3">Rp 900.000</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-red-700/20 text-red-500 rounded text-xs">Unpaid</span></td>
            <td class="px-4 py-3">2025-08-08</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
        <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">4</td>
            <td class="px-4 py-3">Freelancer Studio</td>
            <td class="px-4 py-3">Desain Grafis dengan Canva</td>
            <td class="px-4 py-3">Dewi Lestari</td>
            <td class="px-4 py-3">Rp 800.000</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-green-700/20 text-green-500 rounded text-xs">Paid</span></td>
            <td class="px-4 py-3">2025-08-09</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
        <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">5</td>
            <td class="px-4 py-3">PT. Prima Edukasi</td>
            <td class="px-4 py-3">Manajemen Proyek</td>
            <td class="px-4 py-3">Rizky Aditya</td>
            <td class="px-4 py-3">Rp 2.000.000</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-yellow-700/20 text-yellow-500 rounded text-xs">Pending</span></td>
            <td class="px-4 py-3">2025-08-10</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
            
            </x-table>
        </div>

    </div>
</x-app-layout>
