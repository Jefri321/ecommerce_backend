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
                        <input
                            type="search"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400"
                        >
                    </div>

                    <!-- Transaction Date Range -->
                    <div class="mt-2 grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                                <span>Transaction From</span>
                            </label>
                            <input
                                type="date"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400"
                            >
                        </div>

                        <div>
                            <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                                <span>Transaction To</span>
                            </label>
                            <input
                                type="date"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400"
                            >
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
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400"
                            >
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
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400"
                            >
                                <option value="">--Select One--</option>
                            </select>
                        </div>

                        <!-- Transaction Status -->
                        <div>
                            <label class="mb-4 block font-medium text-sm text-gray-700 dark:text-gray-400">
                                <span>Transaction Status</span>
                            </label>
                            <select
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400"
                            >
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
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:bg-gray-700 dark:text-gray-400"
                            >
                                <option value="">--Select One--</option>
                                <option value="0">Unpaid</option>
                                <option value="1">Paid</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                        >
                            Submit
                        </button>
                    </div>
                </fieldset>
            </div>

            
            <x-table>
                <x-slot name="buttonAdd">
                    <button
                    type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                    >
                        <img
                            src="/images/icons/refresh.png"
                            alt="Refresh Icon"
                            class="inline-block h-4"
                            style="max-width: unset;"
                        >
                        &nbsp; Sync Today
                    </button>
                </x-slot>

                <x-slot name="filter">
                     <button
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
                    >
                        <span>Download</span>
                    </button>
                </x-slot>

                <x-slot name="thead">
                    <tr>
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Agreement %</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Qty</th>
                        <th class="px-4 py-3">Additional Cost</th>
                        <th class="px-4 py-3">Tax Price</th>
                        <th class="px-4 py-3">Payment Gateway Cost</th>
                        <th class="px-4 py-3">Gross</th>
                        <th class="px-4 py-3">After Payment Gateway</th>
                        <th class="px-4 py-3 text-end">Promoter Value</th>
                    </tr>
                </x-slot>

                @for ($i = 1; $i <= 5; $i++)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3">Product {{ $i }}</td>
                    <td class="px-4 py-3">10 %</td>
                    <td class="px-4 py-3">Rp {{ number_format(rand(10000, 50000), 0, ',', '.') }}</td>
                    <td class="px-4 py-3">{{ rand(1, 10) }}</td>
                    <td class="px-4 py-3">Rp {{ number_format(rand(1000, 5000), 0, ',', '.') }}</td>
                    <td class="px-4 py-3">Rp {{ number_format(rand(2000, 7000), 0, ',', '.') }}</td>
                    <td class="px-4 py-3">Rp {{ number_format(rand(500, 1500), 0, ',', '.') }}</td>
                    <td class="px-4 py-3">Rp {{ number_format(rand(60000, 100000), 0, ',', '.') }}</td>
                    <td class="px-4 py-3">Rp {{ number_format(rand(55000, 95000), 0, ',', '.') }}</td>
                    <td class="px-4 py-3 text-end">Rp {{ number_format(rand(10000, 30000), 0, ',', '.') }}</td>
                </tr>
                @endfor

            
            </x-table>
        </div>

    </div>
</x-app-layout>
