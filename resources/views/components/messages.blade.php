 <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-1/2">
        <h2 class="text-2xl font-bold mb-6 text-center">Form Pengiriman</h2>
        <p class="mb-4 text-gray-600 text-center">Silakan isi form di bawah ini untuk mengirimkan email dengan lampiran file.</p>
        <form>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Tujuan</label>
                <p class="text-xs text-gray-500">Masukkan alamat email penerima yang valid.</p>
                <input type="email" id="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500" placeholder="example@domain.com">
            </div>
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                <p class="text-xs text-gray-500">Tuliskan subjek email Anda.</p>
                <input type="text" id="subject" name="subject" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500" placeholder="Masukkan subject">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                <p class="text-xs text-gray-500">Tuliskan pesan yang ingin Anda sampaikan.</p>
                <textarea id="message" name="message" rows="4" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500" placeholder="Masukkan pesan Anda..."></textarea>
            </div>
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">Upload File</label>
                <p class="text-xs text-gray-500">Pilih file yang ingin Anda lampirkan (maksimal 5MB).</p>
                <input type="file" id="file" name="file" required class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
            </div>
           <div class="flex gap-5 max-w-md">
            <button type="button" id="btnBack" 
                class="flex-1 bg-gray-300 text-gray-700 font-semibold py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-300">
                Kembali
            </button>
            <button type="submit" 
                class="flex-1 bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500">
                Kirim
            </button>
        </div>
    </form>
</div>

<script>
    let btnBack = document.getElementById('btnBack');
    btnBack.addEventListener('click', function() {
        window.location.reload();
    })
</script>