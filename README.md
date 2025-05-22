# Laravel + TailwindCSS - CRUD Ruangan (Frontend dengan REST API)

Proyek ini merupakan implementasi CRUD (Create, Read, Update, Delete) untuk data ruangan menggunakan **Laravel sebagai frontend**, **TailwindCSS untuk styling**, dan **REST API eksternal** sebagai backend.

## 🛠️ Fitur

- Menampilkan daftar ruangan
- Menambahkan ruangan
- Mengedit ruangan
- Menghapus ruangan
- Terhubung ke API eksternal (`http://localhost:8080/ruangan`)

---

## BACKEND

### 1. Clone repository BackEnd

```bash
git clone [https://github.com/nama-user/nama-repo.git](https://github.com/MuhammadAbiAM/BE-Jadwal-Skripsi.git)
cd nama-repo
```

### 2. Composer Install
- masuk ke terminal yang dimana Backend itu dijalankan
  
```
composer intall
```
### 3. Copy file .env
- Salin file .env.example menjadi .env dan atur konfigurasi database:

```
cp env .env
```

### 4. Menjalankan CodeIgniter
- masih di terminal yang sama

```
php spark serve
```

### 5. Cek EndPoint menggunakan POSTMAN
Ruangan : 
- GET → http://localhost:8080/ruangan
- GET → http://localhost:8080/ruangan/{id}
- POST → http://localhost:8080/ruangan
- PUT → http://localhost:8080/ruangan/{id}
- DELETE → http://localhost:8080/ruangan/{id}



## FRONTEND
### 1. Install Laravel
- Pergi ke ke folder yang sama dengan Backend
- Masuk ke CMD /terminal
- Lalu ketikan
  
  ```
  composer create-project laravel/laravel FE
  ```

### 2. Membuat View
- di folder yang sama yaitu ruangan
    
#### View index.blade.php
- Membuatnya di View lalu di dalam folder Ruangan
- Membuat file dengan nama "index.blade.php"
  ```
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
    ```

#### view tambahRuangan.blade.php
 ```
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
 ```

#### view editRuangan.blade.php
  
    ```
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ubah Ruangan</title>
        <script src="https://cdn.tailwindcss.com"></script>
        </head>
    <body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Ubah Data Ruangan</h1>
    
            <form method="POST" action="{{ route('ruangan.update', $ruangan['data']['kode_ruangan']) }}">
        @csrf
        @method('PUT')
                <div class="mb-4">
                    <label for="kode_ruangan" class="block text-gray-700 text-sm font-bold mb-2">Kode Ruangan:</label>
                    <input type="text" id="kode_ruangan" name="kode_ruangan" value="{{ $ruangan['data']['kode_ruangan'] }}" readonly
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="nama_ruangan" class="block text-gray-700 text-sm font-bold mb-2">Nama Ruangan:</label>
                    <input type="text" id="nama_ruangan" name="nama_ruangan"   value="{{ $ruangan['data']['nama_ruangan'] }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                        Simpan Perubahan
                    </button>
                    <a href="/ruangan" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </body>
    </html>
    
     ```

    ### 3. Membuat Controller Ruangan
      - membuat controller di terminal
    
              ```
                  php artisan make:controller RuanganController -resource
               
### 4. Isi dari Controller 
     
         <?php
    
    namespace App\Http\Controllers;
    
    
    use Illuminate\Support\Facades\Http; // import Http Client
    use Illuminate\Http\Request;
    class RuanganController extends Controller
    {
        
        public function index()
        {
             $response = Http::get('http://localhost:8080/ruangan');
            $ruangans = $response->json();
            return view('ruangan.index', compact('ruangans'));
        }
    
        public function create()
        {
            return view('ruangan.tambahRuangan');
        }
    
        // Menyimpan ruangan baru
    public function store(Request $request)
        {
            // Validasi form (opsional tapi disarankan)
            $request->validate([
                'kode_ruangan' => 'required',
                'nama_ruangan' => 'required',
            ]);
    
            // Kirim data ke endpoint backend API (POST)
            $response = Http::post('http://localhost:8080/ruangan', [
                'kode_ruangan' => $request->kode_ruangan,
                'nama_ruangan' => $request->nama_ruangan,
            ]);
    
            // Cek apakah berhasil atau gagal
            if ($response->successful()) {
                return redirect('/ruangan')->with('success', 'Data ruangan berhasil ditambahkan!');
            } else {
                return back()->with('error', 'Gagal menambahkan data!');
            }
        } 
    public function edit($kode_ruangan)
    {
        $response = Http::get("http://localhost:8080/ruangan/$kode_ruangan");
        $ruangan = $response->json();
        // dd($ruangan);
        return view('ruangan.editRuangan', compact('ruangan'));
    }
    
    
     // Update data ruangan
        public function update(Request $request, $id)
        {
           // Validasi input
            // Kirim data ke API
        $response = Http::put("http://localhost:8080/ruangan/$id", [
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
        ]);
    
        if ($response->successful()) {
            return redirect('/ruangan')->with('success', 'Data berhasil diubah.');
        } else {
            return back()->with('error', 'Gagal mengubah data.');
        }
    }
    
     public function destroy($id)
        {
            // Kirim DELETE ke endpoint
            Http::delete("http://localhost:8080/ruangan/{$id}");
            return redirect('/ruangan');
        }
    
    
    }

### 5. Melakukan edit kondisikan dengan router
        <?php
    
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\RuanganController;
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return redirect('/ruangan');
    }); //ini tuh yang buat buka halaman dibuat reirect biar bis amasuk ke view index tapi sekalian ngirim variabel ruangans
    
    Route::get('/ruangan', [RuanganController::class, 'index']);
    
    
    Route::get('/ruangan/tambahRuangan', [RuanganController::class, 'create']); // menampilkan form
    Route::post('/ruangan', [RuanganController::class, 'store']); // proses form POST
    
    Route::get('/ruangan/editRuangan/{id}', [RuanganController::class, 'edit'])->name('ruangan.editRuangan');
    Route::put('/ruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
    
    // Hapus ruangan
    Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy']);

### 6. Menjalankan Laravel 
- Masuk ke terminal yang di mana Laravel dijalan
      php artisan serve
  
- Nanti akan ada link seperti ini
  
     
       INFO  Server running on [http://127.0.0.1:8000].
      
  
- Link itu akan mengarah kita ke tampilan halaman laravel yang sudah kita buat
- Klik Ctrl lalu klik linknya 


    
