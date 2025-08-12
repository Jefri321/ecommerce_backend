<div class="relative p-4 w-full max-w-2xl max-h-full flex flex-col justify-center content-center m-auto  h-screen">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 m-auto w-full">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Create Category
            </h3>
        </div>

        <!-- Modal body -->
        <div class="p-4 md:p-5 space-y-4 w-full">
           <form>
               <div class="mb-4">
                   <label for="email" class="block text-sm font-medium text-gray-700">Vendors</label>
                   <select id="countries" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                   <option selected>Choose a vendors</option>
                   <option value="US">United States</option>
                   <option value="CA">Canada</option>
                   <option value="FR">France</option>
                   <option value="DE">Germany</option>
                   </select>
               </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500" placeholder="Masukkan nama">
                </div>
            <!-- Modal footer -->
            <div class="flex items-center border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Submit</button>
                 <!-- Tombol back -->
                <a href="{{ route('sub-category') }}" 
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

<script>
    let reloadButton = document.getElementById('reloadButton');
    reloadButton.addEventListener('click', function() {
        window.location.reload();
    })
</script>