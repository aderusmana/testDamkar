<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Anggota;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function showSubmitForm()
    {
        $tanggal = date('Y-m-d');
        $anggotas = Anggota::all();
        return view('kelompok.submit_absensi', compact('tanggal', 'anggotas'));
    }

    public function store(Request $request)
    {
        $tanggalAbsen = $request->input('tanggal_absen');
        $statuses = $request->input('status');
        $keterangans = $request->input('keterangan');

        foreach ($statuses as $anggotaId => $status) {
            Absensi::create([
                'tanggal_absen' => $tanggalAbsen,
                'anggota_id' => $anggotaId,
                'status' => $status,
                'keterangan' => $keterangans[$anggotaId] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'Data absen hari ini sudah di-submit.');
    }

    public function showRekapitulasi(Request $request)
    {
        $tanggal = $request->input('tanggal', date('Y-m-d'));

        // Total Absensi
        $totalPiketHadir = Absensi::where('tanggal_absen', $tanggal)->where('status', 'piket-hadir')->count();
        $totalCadanganPiket = Absensi::where('tanggal_absen', $tanggal)->where('status', 'cadangan-piket')->count();
        $totalLepasPiket = Absensi::where('tanggal_absen', $tanggal)->where('status', 'lepas-piket')->count();
        $totalIzinSakit = Absensi::where('tanggal_absen', $tanggal)->where('status', 'tidak-hadir')->count();

        // Detail Data
        $rekapitulasiData = Absensi::with('anggota')->where('tanggal_absen', $tanggal)->get();

        return view('apel.rekapitulasi', compact('totalPiketHadir', 'totalCadanganPiket', 'totalLepasPiket', 'totalIzinSakit', 'rekapitulasiData'));
    }

    public function getDetail(Request $request, $status)
    {
        $tanggal = $request->input('tanggal');
        $absensis = Absensi::where('status', $status)
            ->whereDate('tanggal_absen', $tanggal)
            ->get();

        return view('apel.detail', compact('absensis'));
    }

    public function checkAbsensiToday()
    {
        // Ambil tanggal hari ini
        $today = Carbon::today();

        // Cek apakah data absensi sudah ada di tabel berdasarkan tanggal hari ini
        $absensi = Absensi::where('tanggal_absen', $today)->first();

        return response()->json(['isSubmitted' => $absensi ? true : false]);
    }
}
