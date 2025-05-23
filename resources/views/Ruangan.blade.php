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
            <ul>
                <li class="mb-4">
                    <a href="{{route('Ruangan.index')}}" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Ruangan</a>
                </li>
                <li class="mb-4">
                    <a href="{{route('Mahasiswa.index')}}" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Mahasiswa</a>
                </li>
                 <li class="mb-4">
                    <a href="{{route('Jadwal.index')}}" class="block px-4 py-2 text-sm text-white hover:bg-green-600">Data Jadwal Sidang</a>
                </li>
            
        
            </ul>
           
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
    <a href="{{route('Ruangan.create')}}" 
       class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">
        Tambah Ruangan
    </a>
     <input type="text" id="searchInput" placeholder="Cari..." class="border p-2 rounded w-1/3">
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
                                    <a href="{{ route('Ruangan.edit', $ruangan['kode_ruangan']) }}"
   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
   Edit
</a>

                                    <!-- <a href="#" class="text-red-600 hover:text-red-900">Hapus</a> -->

                                     <!-- Form hapus -->
                    <form method="POST" action="{{ route('Ruangan.destroy', $ruangan['kode_ruangan']) }}" style="display:inline;">
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
                     <form action="{{ route('cetak.pdf') }}" method="GET">
                    <button type="submit" class="bg-blue-500 text-white p-2 mt-4 rounded hover:bg-blue-600">
                         Cetak
                    </button>
                </form>
                </div>

            </div>
        </div>
    </main>

</body>

<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let kodeRuangan = row.cells[0].textContent.toLowerCase();
                let namaRuangan = row.cells[1].textContent.toLowerCase();

                if (kodeRuangan.includes(filter) || namaRuangan.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
</script>
</html>

