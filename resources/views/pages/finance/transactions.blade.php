<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Transaction</h1>
            </div>

        </div>

        <!-- Cards -->
        <div class="">
            <div class="mb-4">
                <fieldset class="border-2 p-4 rounded-md dark:border-none dark:bg-gray-800 antialiased">
                    <legend class="font-semibold text-lg mb-2">Filters:</legend>

                    <!-- Search Field -->
                    <div class="mb-4">
                        <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                            <span>Search Order ID or Transaction ID</span>
                        </label>
                        <input type="search"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400">
                    </div>

                    <!-- Transaction Date Range -->
                    <div class="mt-2 grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                                <span>Transaction From</span>
                            </label>
                            <input type="date"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400">
                        </div>

                        <div>
                            <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                                <span>Transaction To</span>
                            </label>
                            <input type="date"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400">
                        </div>
                    </div>

                    <!-- Dropdowns -->
                    <div class="mt-2 md:grid md:grid-cols-4 gap-4">
                        <!-- Promoter -->
                        <div>
                            <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                                <span>Promoter</span>
                            </label>
                            <select
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400">
                                <option value="">--Select One--</option>
                                <option value="2">Mega Career Expo</option>
                                <option value="3">Garuda Organizer</option>
                                <option value="4">PT Indolakto</option>
                                <option value="6">GarudaJaya</option>
                                <option value="7">CKH Entertainment</option>
                            </select>
                        </div>

                        <!-- Event -->
                        <div>
                            <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                                <span>Event</span>
                            </label>
                            <select
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400">
                                <option value="">--Select One--</option>
                            </select>
                        </div>

                        <!-- Transaction Status -->
                        <div>
                            <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                                <span>Transaction Status</span>
                            </label>
                            <select
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400">
                                <option value="">--Select One--</option>
                                <option value="settlement">Settlement</option>
                                <option value="pending">Pending</option>
                                <option value="cancel">Cancel</option>
                                <option value="expire">Expire</option>
                            </select>
                        </div>

                        <!-- Paid From Third Party -->
                        <div>
                            <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                                <span>Paid From Third Party</span>
                            </label>
                            <select
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400">
                                <option value="">--Select One--</option>
                                <option value="0">Unpaid</option>
                                <option value="1">Paid</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Submit
                        </button>
                    </div>
                </fieldset>
            </div>

            <x-table>
                <x-slot name="buttonAdd">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        <img src="/images/icons/refresh.png" alt="Refresh Icon" class="inline-block h-4"
                            style="max-width: unset;">
                        &nbsp; Sync Today
                    </button>
                </x-slot>

                <x-slot name="filter">
                    <button
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <span>Download</span>
                    </button>
                </x-slot>

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
                    <td class="px-4 py-3"><span
                            class="px-2 py-1 bg-green-700/20 text-green-500 rounded text-xs">Paid</span></td>
                    <td class="px-4 py-3">2025-08-05</td>
                    <td class="px-4 py-3 text-right cursor-pointer">...</td>
                </tr>
                <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
                    <td class="px-4 py-3">2</td>
                    <td class="px-4 py-3">CV. Digital Kreatif</td>
                    <td class="px-4 py-3">Digital Marketing & SEO</td>
                    <td class="px-4 py-3">Siti Rahmawati</td>
                    <td class="px-4 py-3">Rp 1.200.000</td>
                    <td class="px-4 py-3"><span
                            class="px-2 py-1 bg-yellow-700/20 text-yellow-500 rounded text-xs">Pending</span></td>
                    <td class="px-4 py-3">2025-08-07</td>
                    <td class="px-4 py-3 text-right cursor-pointer">...</td>
                </tr>
                <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
                    <td class="px-4 py-3">3</td>
                    <td class="px-4 py-3">PT. Solusi Mandiri</td>
                    <td class="px-4 py-3">Public Speaking & Presentasi</td>
                    <td class="px-4 py-3">Andi Pratama</td>
                    <td class="px-4 py-3">Rp 900.000</td>
                    <td class="px-4 py-3"><span
                            class="px-2 py-1 bg-red-700/20 text-red-500 rounded text-xs">Unpaid</span></td>
                    <td class="px-4 py-3">2025-08-08</td>
                    <td class="px-4 py-3 text-right cursor-pointer">...</td>
                </tr>
                <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
                    <td class="px-4 py-3">4</td>
                    <td class="px-4 py-3">Freelancer Studio</td>
                    <td class="px-4 py-3">Desain Grafis dengan Canva</td>
                    <td class="px-4 py-3">Dewi Lestari</td>
                    <td class="px-4 py-3">Rp 800.000</td>
                    <td class="px-4 py-3"><span
                            class="px-2 py-1 bg-green-700/20 text-green-500 rounded text-xs">Paid</span></td>
                    <td class="px-4 py-3">2025-08-09</td>
                    <td class="px-4 py-3 text-right cursor-pointer">...</td>
                </tr>
                <tr class="px-4 py-3 font-medium whitespace-nowrap dark:text-white">
                    <td class="px-4 py-3">5</td>
                    <td class="px-4 py-3">PT. Prima Edukasi</td>
                    <td class="px-4 py-3">Manajemen Proyek</td>
                    <td class="px-4 py-3">Rizky Aditya</td>
                    <td class="px-4 py-3">Rp 2.000.000</td>
                    <td class="px-4 py-3"><span
                            class="px-2 py-1 bg-yellow-700/20 text-yellow-500 rounded text-xs">Pending</span></td>
                    <td class="px-4 py-3">2025-08-10</td>
                    <td class="px-4 py-3 text-right cursor-pointer">...</td>
                </tr>

            </x-table>

        </div>

    </div>
</x-app-layout>
