<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di SI</title>
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
            <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Selamat Datang di Sistem Informasi Akademik</h1>
            <p class="text-gray-700 leading-relaxed mb-4 text-center">
                Ini adalah halaman utama sistem informasi akademik. Anda dapat mengakses berbagai fitur melalui navigasi di sebelah kiri.
            </p>
            <div class="text-center">
                <p class="text-lg text-gray-600">Silakan pilih menu di samping untuk melanjutkan.</p>
            </div>
        </div>
    </main>

</body>
</html>
