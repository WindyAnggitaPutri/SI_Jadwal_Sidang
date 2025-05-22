<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Ubah Data Mahasiswa</h1>

        <form method="POST" action="{{ route('Mahasiswa.update', $mahasiswa['data']['npm']) }}">
         @csrf
    @method('PUT')    
        <div class="mb-4">
                <label for="npm" class="block text-gray-700 text-sm font-bold mb-2">NPM:</label>
                <input type="text" id="npm" name="npm" value="{{ $mahasiswa['data']['npm'] }}" readonly
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="nama_mahasiswa" class="block text-gray-700 text-sm font-bold mb-2">Nama Mahasiswa:</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"  value="{{ $mahasiswa['data']['nama_mahasiswa'] }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="program_studi" class="block text-gray-700 text-sm font-bold mb-2">Program Studi:</label>
                <input type="text" id="program_studi" name="program_studi"  value="{{ $mahasiswa['data']['program_studi'] }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="judul_skripsi" class="block text-gray-700 text-sm font-bold mb-2">Judul Skripsi:</label>
                <input type="text" id="judul_skripsi" name="judul_skripsi"  value="{{ $mahasiswa['data']['judul_skripsi'] }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email"  value="{{ $mahasiswa['data']['email'] }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Simpan Perubahan
                </button>
                <a href="/Mahasiswa" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>
