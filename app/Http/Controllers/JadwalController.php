<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http; // import Http Client
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import Log

class JadwalController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/view_jadwal');

        if ($response->successful()) {
            // Pastikan 'data' ada sebelum mengaksesnya
            $data = $response->json()['data'] ?? [];
            $jadwals = collect($data)->sortBy('id_jadwal')->values();
            return view('Jadwal', compact('jadwals'));
        } else {
            Log::error('Gagal mengambil data jadwal dari API: ' . $response->body());
            return back()->with('error', 'Gagal mengambil data jadwal. Silakan coba lagi.');
        }
    }

    public function create()
    {
        $mahasiswa = collect(Http::get('http://localhost:8080/mahasiswa')->json()['data'] ?? [])->sortBy('nama_mahasiswa')->values();
        $ruangan = collect(Http::get('http://localhost:8080/ruangan')->json()['data'] ?? [])->sortBy('nama_ruangan')->values();

        return view('tambahjadwal', compact('mahasiswa', 'ruangan'));
    }

    public function store(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'npm' => 'required',
            'kode_ruangan' => 'required',
            'waktu_sidang' => 'required|date' // Pastikan format tanggal dan waktu valid
        ]);

        $response = Http::post('http://localhost:8080/jadwal', $validated);

        if ($response->successful()) {
            return redirect()->route('Jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
        } else {
            // Log error response dari API
            Log::error('Gagal menambahkan jadwal. Respon API: ' . $response->body());
            return back()->with('error', 'Gagal menambahkan jadwal. Silakan coba lagi.');
        }
    }

    public function edit($id_jadwal)
    {
        //
        $jadwal = Http::get("http://localhost:8080/jadwal/$id_jadwal")->json()['data'] ?? null;
        $mahasiswa = Http::get('http://localhost:8080/mahasiswa')->json()['data'] ?? [];
        $ruangan = Http::get('http://localhost:8080/ruangan')->json()['data'] ?? [];

        if (!$jadwal) {
            return redirect()->route('Jadwal.index')->with('error', 'Data tidak ditemukan');
        }

        return view('ubahJadwal', compact('jadwal', 'mahasiswa', 'ruangan'));
    }

    public function update(Request $request, $id_jadwal)
    {
          //
        $validated = $request->validate([
            'npm' => 'required',
            'kode_ruangan' => 'required',
            'waktu_sidang' => 'required|date'
        ]);

        $response = Http::put("http://localhost:8080/jadwal/$id_jadwal", $validated);

        if ($response->successful()) {
            return redirect()->route('Jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
        } else {
            return back()->with('error', 'Gagal memperbarui jadwal');
        }
        
       
    }

    public function destroy($id_jadwal)
    {
        // Kirim DELETE ke endpoint
        $response = Http::delete("http://localhost:8080/jadwal/{$id_jadwal}");

        if ($response->successful()) {
            return redirect()->route('Jadwal.index')->with('success', 'Data berhasil dihapus.');
        } else {
            Log::error('Gagal menghapus data jadwal. Respon API: ' . $response->body());
            return redirect()->route('Jadwal.index')->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }
}