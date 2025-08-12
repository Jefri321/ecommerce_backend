<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Revenue</h1>
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
