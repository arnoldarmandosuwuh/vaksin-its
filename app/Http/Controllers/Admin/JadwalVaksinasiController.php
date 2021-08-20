<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Vaksinator;
use App\Models\JenisVaksin;
use Illuminate\Http\Request;
use App\Models\JadwalVaksinasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JadwalVaksinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = JadwalVaksinasi::orderBy('pelaksanaan', 'DESC')->get();
        $today = Carbon::now()->format('Y-m-d');
        return view('pages.admin.jadwal-vaksin.index', [
            'jadwal' => $jadwal,
            'today' => $today,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vaksinator = Vaksinator::all();
        $vaksin = JenisVaksin::all();
        return view('pages.admin.jadwal-vaksin.create', [
            'vaksinators' => $vaksinator,
            'vaksins' => $vaksin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'vaksinator_id' => 'required|exists:vaksinator,id',
                'vaksin_id' => 'required|exists:jenis_vaksin,id',
                'pendaftaran_mulai' => 'required',
                'pendaftaran_selesai' => 'required|after_or_equal:pendaftaran_mulai',
                'pelaksanaan' => 'required',
                'sesi_mulai' => 'required',
                'sesi_selesai' => 'required||after_or_equal:sesi_mulai',
                'lokasi' => 'required|string',
                'kuota' => 'required|numeric'
            ]
        );
        if($validate->fails()) {
            return back()->with('errors', $validate->message()->all()[0]->withInput());
        } else {
            $vaksin = JadwalVaksinasi::create([
                'vaksinator_id' => $request->vaksinator_id,
                'vaksin_id' => $request->vaksin_id,
                'pendaftaran_mulai' => $request->pendaftaran_mulai,
                'pendaftaran_selesai' => $request->pendaftaran_selesai,
                'pelaksanaan' => $request->pelaksanaan,
                'sesi_mulai' => $request->sesi_mulai,
                'sesi_selesai' => $request->sesi_selesai,
                'lokasi' => $request->lokasi,
                'kuota' => $request->kuota
            ]);

            if ($vaksin) {
                return redirect()->route('jadwal-vaksinasi.index')->with('success', 'Jadwal vaksinasi berhasil ditambahkan.');
            } else {
                return back()->with('errors', 'Jadwal vaksinasi gagal ditambahkan.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = JadwalVaksinasi::findOrFail($id)->with(['vaksinator', 'vaksin', 'peserta'])->first();
        return view('pages.admin.jadwal-vaksin.show', [
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = JadwalVaksinasi::findOrFail($id)->first();
        $vaksinator = Vaksinator::all();
        $vaksin = JenisVaksin::all();
        return view('pages.admin.jadwal-vaksin.edit', [
            'jadwal' => $jadwal,
            'vaksinators' => $vaksinator,
            'vaksins' => $vaksin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'vaksinator_id' => 'required|exists:vaksinator,id',
                'vaksin_id' => 'required|exists:jenis_vaksin,id',
                'pendaftaran_mulai' => 'required',
                'pendaftaran_selesai' => 'required|after_or_equal:pendaftaran_mulai',
                'pelaksanaan' => 'required',
                'sesi_mulai' => 'required',
                'sesi_selesai' => 'required||after_or_equal:sesi_mulai',
                'lokasi' => 'required|string',
                'kuota' => 'required|numeric'
            ]
        );
        if($validate->fails()) {
            return back()->with('errors', $validate->message()->all()[0]->withInput());
        } else {
            $data = $request->all();
            $vaksin = JadwalVaksinasi::findOrFail($id);
            $vaksin->update($data);

            if ($vaksin) {
                return redirect()->route('jadwal-vaksinasi.index')->with('success', 'Jadwal vaksinasi berhasil dirubah.');
            } else {
                return back()->with('errors', 'Jadwal vaksinasi gagal dirubah.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $jadwal = JadwalVaksinasi::findOrFail($request->id);
        $jadwal->delete();

        return redirect()->route('jadwal-vaksinasi.index')->with('success', 'Jadwal vaksinasi berhasil dihapus.');
    }
}
