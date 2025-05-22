<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Tambah Data Mahasiswa</h1>

        <form action="{{route('Mahasiswa.store')}}" method="post">
             @csrf
            <div class="mb-4">
                <label for="npm" class="block text-gray-700 text-sm font-bold mb-2">NPM:</label>
                <input type="text" id="npm" name="npm" placeholder="Masukkan NPM mahasiswa"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="nama_mahasiswa" class="block text-gray-700 text-sm font-bold mb-2">Nama Mahasiswa:</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan nama mahasiswa"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

        <div class="mb-4">
            <label for="program_studi" class="block text-gray-700 text-sm font-bold mb-2">Program Studi:</label>
            <select id="program_studi" name="program_studi"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                <option value="" disabled selected>Pilih Program Studi</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi }}">{{ $prodi }}</option>
                @endforeach
            </select>
        </div>



            <div class="mb-4">
                <label for="judul_skripsi" class="block text-gray-700 text-sm font-bold mb-2">Judul Skripsi:</label>
                <input type="text" id="judul_skripsi" name="judul_skripsi" placeholder="Masukkan judul skripsi"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email mahasiswa"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Simpan Mahasiswa
                </button>
                <a href="/Mahasiswa" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>
