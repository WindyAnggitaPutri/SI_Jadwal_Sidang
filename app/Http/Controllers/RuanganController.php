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
        return view('Ruangan', compact('ruangans'));
    }

    public function create()
    {
        return view('tambahRuangan');
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
            return redirect('Ruangan')->with('success', 'Data ruangan berhasil ditambahkan!'); //Ruangan nya itu untuk kembali, jadi harus sama kaya nama view
        } else {
            return back()->with('error', 'Gagal menambahkan data!');
        }
    } 
public function edit($kode_ruangan)
{
    $response = Http::get("http://localhost:8080/ruangan/$kode_ruangan");
    $ruangan = $response->json();
    //dd($ruangan);
    return view('editRuangan', compact('ruangan'));
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
        return redirect('Ruangan')->with('success', 'Data berhasil diubah.');
    } else {
        return back()->with('error', 'Gagal mengubah data.');
    }
}

 public function destroy($kode_ruangan)
    {
        // Kirim DELETE ke endpoint
        Http::delete("http://localhost:8080/ruangan/{$kode_ruangan}");
        return redirect('Ruangan');
    }

     public function exportPdf()
    {
        $response = Http::get('http://localhost:8080/ruangan');
        if ($response->successful()) {
            $ruangan = collect($response->json());
            $pdf = Pdf::loadView('pdf.cetak', compact('ruangan')); // Ubah 'cetak.pdf' menjadi 'pdf.cetak'
            return $pdf->download('ruangan.pdf');
        } else {
            return back()->with('error', 'Gagal mengambil data untuk PDF');
        }
    }

}
