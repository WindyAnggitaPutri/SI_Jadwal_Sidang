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

        <form method="POST" action="{{ route('Jadwal.update', $jadwal['id_jadwal']) }}">
              @csrf
                    @method('PUT')


            <label for="nama_mahasiswa" class="block mb-1">Nama Mahasiswa</label>
                    <select id="nama_mahasiswa" name="npm" class="border w-full p-2 mb-4 rounded" required>
                        @foreach($mahasiswa as $mhs)
                        <option value="{{ $mhs['npm'] }}" {{ $jadwal['npm'] == $mhs['npm'] ? 'selected' : '' }}>
                            {{ $mhs['nama_mahasiswa'] }}
                        </option>
                        @endforeach
                    </select>

           <label for="ruangan" class="block mb-1">Nama Ruangan</label>
                    <select id="ruangan" name="kode_ruangan" class="border w-full p-2 mb-4 rounded" required>
                        @foreach($ruangan as $row)
                        <option value="{{ $row['kode_ruangan'] }}"
                            {{ $jadwal['kode_ruangan'] == $row['kode_ruangan'] ? 'selected' : '' }}>
                            {{ $row['nama_ruangan'] }}
                        </option>
                        @endforeach
                    </select>

                  <label for="waktu_sidang" class="block mb-1">Waktu Sidang</label>
                    <input type="datetime-local" id="waktu_sidang" name="waktu_sidang"
                        value="{{ date('Y-m-d\TH:i', strtotime($jadwal['waktu_sidang'])) }}"
                        class="border w-full p-2 mb-4 rounded" required />


            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Simpan Perubahan
                </button>
                <a href="/Jadwal" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>
