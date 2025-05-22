<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http; // import Http Client
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
       public function index()
    {
         $response = Http::get('http://localhost:8080/mahasiswa');
        $mahasiswas= $response->json();
        return view('Mahasiswa', compact('mahasiswas'));
    }

    public function create()
    {
      
    $prodis = [
        'D3 Teknik Elektronika',
        'D3 Teknik Listrik',
        'D3 Teknik Informatika',
        'D3 Teknik Mesin',
        'D4 Teknik Pengendalian Pencemaran Lingkungan',
        'D4 Pengembangan Produk Agroindustri',
        'D4 Teknologi Rekayasa Energi Terbarukan',
        'D4 Rekayasa Kimia Industri',
        'D4 Teknologi Rekayasa Mekatronika',
        'D4 Rekayasa Keamanan Siber',
        'D4 Teknologi Rekayasa Multimedia',
        'D4 Akuntansi Lembaga Keuangan Syariah',
        'D4 Rekayasa Perangkat Lunak'
    ];

    return view('tambahMahasiswa', compact('prodis'));
}

    

    // Menyimpan ruangan baru
public function store(Request $request)
    {
        // Validasi form (opsional tapi disarankan)
        $request->validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
            'program_studi' => 'required',
            'judul_skripsi' => 'required',
            'email' => 'required',
            
        ]);

        // Kirim data ke endpoint backend API (POST)
        $response = Http::post('http://localhost:8080/mahasiswa', [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
             'program_studi' => $request->program_studi,
              'judul_skripsi' => $request->judul_skripsi,
               'email' => $request->email,
               ]);
           

        // Cek apakah berhasil atau gagal
        if ($response->successful()) {
            return redirect('Mahasiswa')->with('success', 'Data ruangan berhasil ditambahkan!'); //Ruangan nya itu untuk kembali, jadi harus sama kaya nama view
        } else {
            // dd($response->body());
            return back()->with('error', 'Gagal menambahkan data!'. $response->body());
        }
    } 
public function edit($npm)
{
    $response = Http::get("http://localhost:8080/mahasiswa/$npm");
    $mahasiswa = $response->json();
    // dd($ruangan);
    return view('editMahasiswa', compact('mahasiswa'));
}


 // Update data ruangan
    public function update(Request $request, $npm)
    {
       // Validasi input
        // Kirim data ke API
    $response = Http::put("http://localhost:8080/mahasiswa/$npm", [
       'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
             'program_studi' => $request->program_studi,
              'judul_skripsi' => $request->judul_skripsi,
               'email' => $request->email,
    ]);

    if ($response->successful()) {
        return redirect('Mahasiswa')->with('success', 'Data berhasil diubah.');
    } else {
        // dd($ruangan);
        return back()->with('error', 'Gagal mengubah data.');
    }
}

 public function destroy($npm)
    {
        // Kirim DELETE ke endpoint
        Http::delete("http://localhost:8080/mahasiswa/{$npm}");
        return redirect('Mahasiswa');
    }

}
