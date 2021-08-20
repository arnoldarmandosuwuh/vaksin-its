<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Models\JadwalVaksinasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JadwalVaksinController extends Controller
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
        return view('pages.pegawai.jadwal-vaksin.index', [
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
        //
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
                'jadwal_vaksin_id' => 'required'
            ]
        );
        if($validate->fails()) {
            return back()->with('errors', $validate->message()->all()[0]->withInput());
        } else {
            $cek_vaksin = Peserta::where('pegawai_id', '=', Auth::user()->pegawai[0]->id)->count();

            if ($cek_vaksin > 0) {
                $vaksin_ke = 2;
                $tanggal_kembali = null;
            } else {
                $vaksin_ke = 1;
                $tanggal_kembali = Carbon::now()->addDays(28);
            }

            $peserta = Peserta::create([
                'jadwal_vaksin_id' => $request->jadwal_vaksin_id,
                'pegawai_id' => Auth::user()->pegawai[0]->id,
                'tanggal_vaksin' => Carbon::now(),
                'vaksin_ke' => $vaksin_ke,
                'tanggal_kembali' => $tanggal_kembali,
            ]);

            $peserta->save();
    
            if ($peserta) {
                return redirect()->route('jadwal-vaksin.index')->with('success', 'Pendaftaran vaksinasi berhasil.');
            } else {
                return back()->with('errors', 'Pendaftaran vaksinasi gagal.');
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
        return view('pages.pegawai.jadwal-vaksin.show', [
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
