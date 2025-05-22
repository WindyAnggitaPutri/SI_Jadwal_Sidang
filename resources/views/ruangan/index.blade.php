<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD RUANGAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex font-sans">

    <aside class="bg-green-800 text-white w-64 py-6 px-3 flex flex-col">
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-center">SI Akademik</h1>
            <p class="text-sm text-green-200 text-center">Selamat Datang</p>
        </div>
        <nav class="flex-grow">
            <div class="relative group">
                <button class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-white hover:bg-green-700 focus:outline-none">
                    Menu
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div class="absolute hidden group-hover:block bg-green-700 rounded shadow mt-2 w-44">
                    <a href="/dosen" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Dosen</a>
                    <a href="/mahasiswa" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Mahasiswa</a>
                    <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Ruangan</a>
                </div>
            </div>
        </nav>
    </aside>

    <main class="flex-grow bg-gray-100 p-8">
        <div class="bg-white rounded-lg shadow-md p-10">
            <div class="container mx-auto py-8">

                <div class="text-3xl font-semibold text-center text-gray-400 mt-8 mb-10">
                    <h1>DATA RUANGAN</h1>
                </div>
                <div class="mb-4 text-left">
                    <div class="mb-4 text-left">
    <a href="{{ url('/ruangan/tambahRuangan') }}" 
       class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">
        Tambah Ruangan
    </a>
</div>

                </div>

                <div class="shadow overflow-hidden border-b border-gray-200 rounded">
                    <table class="min-w-full bg-white table-auto border border-gray-400 border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="px-4 py-2">Kode Ruangan</th>
                                <th class="px-4 py-2">Nama Ruangan</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                             @foreach($ruangans['data'] as $ruangan)
                        <tr>
                              <td class="px-4 py-2">{{ $ruangan['kode_ruangan'] }}</td>
                             <td class="px-4 py-2">{{ $ruangan['nama_ruangan'] }}</td>
                              <td class="px-4 py-2">
                                    <a href="/ruangan/editRuangan/{{ $ruangan['kode_ruangan'] }}"
   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
   Edit
</a>

                                    <!-- <a href="#" class="text-red-600 hover:text-red-900">Hapus</a> -->

                                     <!-- Form hapus -->
                    <form method="POST" action="/ruangan/{{ $ruangan['kode_ruangan'] }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                                </td>
                            </tr>
                            <!-- Tambahkan baris data lain sesuai kebutuhan -->
                                 @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>

</body>
</html>
