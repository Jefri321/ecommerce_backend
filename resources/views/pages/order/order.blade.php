<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl dark:text-gray-100 font-bold">Menagement Order</h1>
            </div>

        </div>
        
        <!-- Cards -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg ">
            <div class="p-6  min-h-screen dark:text-gray-400">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <div class="w-full md:w-1/2 mb-5">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <!-- <h1 class="text-lg font-semibold">All Orders</h1> -->
                <div class="flex gap-2">

                <button class="px-4 py-1.5 text-white bg-gray-700 rounded text-sm">+ Add new product</button>
                </div>
            </div>

            <!-- Status Filters -->
            <div class="flex gap-4 mb-4 text-sm">
                <label><input type="radio" name="status" checked> All</label>
                <label><input type="radio" name="status"> Deal</label>
                <label><input type="radio" name="status"> Follow Up</label>
                <label><input type="radio" name="status"> Pending</label>
                <label><input type="radio" name="status"> Lost </label>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg mb-5">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">CLIENT</th>
            <th class="px-4 py-3">PELATIHAN</th>
            <th class="px-4 py-3">CONTACT PERSON</th>
            <th class="px-4 py-3">SALES PIC</th>
            <th class="px-4 py-3">STATUS NEGOSIASI</th>
            <th class="px-4 py-3">TGL KONTAK</th>
            <th class="px-4 py-3"></th>
        </tr>
    </thead>
    <tbody class="divide-y">
       <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">1</td>
            <td class="px-4 py-3">PT. Maju Jaya</td>
            <td class="px-4 py-3">Pemrograman Web dengan Laravel</td>
            <td class="px-4 py-3">Rina Kurnia</td>
            <td class="px-4 py-3">Budi Santoso</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-blue-700/20 text-blue-500 rounded text-xs">Follow Up</span></td>
            <td class="px-4 py-3">2025-08-05</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
        <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">2</td>
            <td class="px-4 py-3">CV. Digital Kreatif</td>
            <td class="px-4 py-3">Digital Marketing & SEO</td>
            <td class="px-4 py-3">Adi Saputra</td>
            <td class="px-4 py-3">Siti Rahmawati</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-yellow-700/20 text-yellow-500 rounded text-xs">Pending</span></td>
            <td class="px-4 py-3">2025-08-07</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
        <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">3</td>
            <td class="px-4 py-3">PT. Solusi Mandiri</td>
            <td class="px-4 py-3">Public Speaking & Presentasi</td>
            <td class="px-4 py-3">Dian Prasetyo</td>
            <td class="px-4 py-3">Andi Pratama</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-green-700/20 text-green-500 rounded text-xs">Deal</span></td>
            <td class="px-4 py-3">2025-08-08</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
        <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">4</td>
            <td class="px-4 py-3">Freelancer Studio</td>
            <td class="px-4 py-3">Desain Grafis dengan Canva</td>
            <td class="px-4 py-3">Tina Mulyani</td>
            <td class="px-4 py-3">Dewi Lestari</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-red-700/20 text-red-500 rounded text-xs">Lost</span></td>
            <td class="px-4 py-3">2025-08-09</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
        <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
            <td class="px-4 py-3">5</td>
            <td class="px-4 py-3">PT. Prima Edukasi</td>
            <td class="px-4 py-3">Manajemen Proyek</td>
            <td class="px-4 py-3">Bayu Firmansyah</td>
            <td class="px-4 py-3">Rizky Aditya</td>
            <td class="px-4 py-3"><span class="px-2 py-1 bg-yellow-700/20 text-yellow-500 rounded text-xs">Pending</span></td>
            <td class="px-4 py-3">2025-08-10</td>
            <td class="px-4 py-3 text-right cursor-pointer">...</td>
        </tr>
    </tbody>
                </table>
            </div>

            <x-pagination-numeric class="mt-5 bottom-0 absolute"/>
          </div>
        </div>

    </div>
</x-app-layout>
