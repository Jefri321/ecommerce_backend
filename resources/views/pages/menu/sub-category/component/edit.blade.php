<div class="relative p-4 w-full max-w-2xl max-h-full flex flex-col justify-center h-screen content-center m-auto ">
    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 m-auto w-full">
        <div
            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Edit Categorys
            </h3>
        </div>

        <div class="p-4 md:p-5 space-y-4 w-full">
            <form id="formEditCategory" action="{{ route('category.update', $category->id) }}" method="POST" class="space-y-4">
                @csrf
                <div class="mb-4">
                    <label for="vendor_id" class="block text-sm font-medium text-gray-700">Vendors</label>
                    <select id="vendor_id" name="vendor_id"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Choose a vendor</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}"
                                {{ optional($category->vendor)->id == $vendor->id ? 'selected' : '' }}>
                                {{ $vendor->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-red-500 text-sm error-text" id="error-vendor_id"></span>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                        value="{{ $category->name }}" placeholder="Masukkan nama">
                    <span class="text-red-500 text-sm error-text" id="error-name"></span>
                </div>

                <div class="flex items-center border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Submit</button>

                    <a href="{{ route('category') }}"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none 
                        bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 
                        focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 
                        dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 
                        dark:hover:text-white dark:hover:bg-gray-700">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
