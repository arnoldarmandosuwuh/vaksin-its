<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalVaksinasi;
use App\Models\Peserta;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $vaksin = Peserta::with(['pegawai', 'jadwal'])->get();

        return view('pages.admin.laporan.index', [
            'vaksin' => $vaksin,
        ]);
    }

    public function show($id)
    {
        $laporan = Peserta::with(['pegawai', 'jadwal'])->findOrFail($id);

        return view('pages.admin.laporan.detail', [
            'laporan' => $laporan,
        ]);
    }

    public function hadir($id)
    {
        $peserta = Peserta::findOrFail($id);

        $peserta->update([
            'hadir' => 1,
        ]);

        if ($peserta) {
            return redirect()->route('laporan.index')->with('success', 'Peserta hadir.');
        } else {
            return back()->with('errors', 'Gagal update kehadiran peserta.');
        }
    }

    public function tidakHadir($id)
    {
        $peserta = Peserta::findOrFail($id);

        $peserta->update([
            'hadir' => 2,
        ]);

        if ($peserta) {
            return redirect()->route('laporan.index')->with('success', 'Peserta hadir.');
        } else {
            return back()->with('errors', 'Gagal update kehadiran peserta.');
        }
    }
}
