<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Sidang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Tambah Data Jadwal Sidang</h1>

        <form action="{{route('Jadwal.store')}}" method="post">
            @csrf
            <div class="mb-4"> <label for="nama_mahasiswa" class="block text-gray-700 text-sm font-bold mb-2">Nama Mahasiswa</label>
                <select id="nama_mahasiswa" name="npm" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                    @foreach($mahasiswa as $row)
                    <option value="{{$row['npm']}}">{{$row['nama_mahasiswa']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="nama_ruangan" class="block text-gray-700 text-sm font-bold mb-2">Nama Ruangan</label>
                <select id="nama_ruangan" name="kode_ruangan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                    @foreach($ruangan as $row)
                    <option value="{{$row['kode_ruangan']}}">{{$row['nama_ruangan']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="waktu_sidang" class="block text-gray-700 text-sm font-bold mb-2">Waktu Sidang</label>
                <input type="datetime-local" id="waktu_sidang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500" name="waktu_sidang">
            </div>

            <div class="flex justify-center space-x-4 mt-6">
                <a href="{{route('Jadwal.index')}}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition duration-200">
                    Batal
                </a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200 active:scale-95">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>
</html>