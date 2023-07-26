<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::with('jadwal')->get();
        $jadwal = Jadwal::all();
        return view('anggota.index', compact('anggotas', 'jadwal'));
    }

    public function store(Request $request)
    {
        // Validasi data sebelum menyimpan
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'jadwal_id' => 'exists:jadwals,id|nullable',
        ]);

        $create = Anggota::create($request->all());

        if ($create) {
            return redirect('/kelompok/anggota')->with('success', 'Data Anggota berhasil di Tambah');
        } else {
            return redirect('/kelompok/anggota')->with('error', "Data Anggota gagal ditambah, cek kembali");
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi data sebelum menyimpan
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'jadwal_id' => 'exists:jadwals,id|nullable',
        ]);

        $update = Anggota::findOrFail($id);
        $update->update($request->all());

        if ($update) {
            return redirect('/kelompok/anggota')->with('success', 'Data Anggota berhasil di Update');
        } else {
            return redirect('/kelompok/anggota')->with('error', "Data Anggota gagal diupdate, cek kembali");
        }
    }
    public function destroy($id)
    {
        $delete = Anggota::findOrFail($id);
        $delete->delete();

        if ($delete) {
            return redirect('/kelompok/anggota')->with('success', 'Data Anggota berhasil di Hapus');
        } else {
            return redirect('/kelompok/anggota')->with('error', "Data Anggota gagal dihapus, cek kembali");
        }
    }
}
