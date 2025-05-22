<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Tambah Data Ruangan</h1>

        <form method="POST" action="/ruangan">
            @csrf
            <div class="mb-4">
                <label for="kode_ruangan" class="block text-gray-700 text-sm font-bold mb-2">Kode Ruangan:</label>
                <input type="text" id="kode_ruangan" name="kode_ruangan" placeholder="Masukkan kode ruangan"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="nama_ruangan" class="block text-gray-700 text-sm font-bold mb-2">Nama Ruangan:</label>
                <input type="text" id="nama_ruangan" name="nama_ruangan" placeholder="Masukkan nama ruangan"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Simpan Ruangan
                </button>
                <a href="/ruangan" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>
