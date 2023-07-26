<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('jadwal.index', compact('jadwals'));
    }

    public function store(Request $request)
    {
        // Validasi data sebelum menyimpan
        $request->validate([
            'kode_piket' => 'required|in:A,B,C,D',
            'status' => 'required|in:piket-hadir,cadangan-piket,lepas-piket,tidak-hadir',
        ]);

        $create = Jadwal::create($request->all());

        if ($create) {
            return redirect('/kelompok/jadwal')->with('success', 'Data jadwal berhasil di Tambah');
        } else {
            return redirect('/kelompok/jadwal')->with('error', "Data jadwal gagal ditambah, cek kembali");
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi data sebelum menyimpan
        $request->validate([
            'kode_piket' => 'required|in:A,B,C,D',
            'status' => 'required|in:piket-hadir,cadangan-piket,lepas-piket,tidak-hadir',
        ]);

        $update = Jadwal::findOrFail($id);
        $update->update($request->all());

        if ($update) {
            return redirect('/kelompok/jadwal')->with('success', 'Data jadwal berhasil di Update');
        } else {
            return redirect('/kelompok/jadwal')->with('error', "Data jadwal gagal diupdate, cek kembali");
        }
    }

    public function destroy($id)
    {
        $delete = Jadwal::findOrFail($id);
        $delete->delete();

        if ($delete) {
            return redirect('/kelompok/jadwal')->with('success', 'Data delete berhasil di Hapus');
        } else {
            return redirect('/kelompok/jadwal')->with('error', "Data delete gagal dihapus, cek kembali");
        }
    }
}
