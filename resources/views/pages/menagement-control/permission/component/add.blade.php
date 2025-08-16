<div class="relative p-4 w-full max-w-2xl max-h-full flex flex-col justify-center content-center m-auto  h-screen">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 m-auto w-full">
        <!-- Modal header -->
        <div
            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Create Permission
            </h3>
        </div>

        <!-- Modal body -->
        <div class="p-4 md:p-5 space-y-4 w-full">
            <form id="formAddPermission" action="{{ route('permission.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                        placeholder="Masukkan nama">
                    <span class="text-red-500 text-sm error-text" id="error-name"></span>
                    <span class="text-red-500 text-sm error-text" id="message"></span>
                </div>
        </div>

        <!-- Modal footer -->
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button type="submit"
                class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Submit</button>
            <a href="{{ route('permission') }}"
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('formAddPermission');
        const nameInput = document.getElementById('name');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(form);
            document.getElementById('message').textContent = '';

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest' // penting supaya Laravel tahu ini Ajax
                    }
                })
                .then(async res => {
                    const data = await res.json(); // ambil json dari response
                    console.log(data);
                    
                    if (!res.ok) {
                        // validasi error
                        if (data.errors) {
                            document.getElementById('message').textContent = data.errors;
                            for (let key in data.errors) {
                                const errorSpan = document.getElementById(`error-${key}`);
                                if (errorSpan) {
                                    errorSpan.textContent = data.errors[key][
                                        0
                                    ]; // ambil pesan pertama
                                }
                            }
                        }
                        return; // hentikan eksekusi jika error
                    }

                    // sukses
                    alert('category berhasil dibuat!');
                    form.reset(); // reset form
                    location.reload(); // optional, refresh tabel
                })
                .catch(err => console.error('Fetch Error:', err));

        });
    });
</script>
