<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisVaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisVaksinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaksin = JenisVaksin::all();
        return view('pages.admin.jenis-vaksin.index', [
            'vaksin' => $vaksin,
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
                'nama' => 'required|string|max:255'
            ]
        );
        if($validate->fails()) {
            return back()->with('errors', $validate->message()->all()[0]->withInput());
        } else {
            $vaksin = JenisVaksin::create([
                'nama' => $request->nama
            ]);

            if ($vaksin) {
                return redirect()->route('jenis-vaksin.index')->with('success', 'Jenis Vaksin berhasil ditambahkan.');
            } else {
                return back()->with('errors', 'Jenis Vaksin gagal ditambahkan.');
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
        //
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
    public function destroy(Request $request)
    {
        $vaksin = JenisVaksin::findOrFail($request->id);
        $vaksin->delete();

        return redirect()->route('jenis-vaksin.index')->with('success', 'Jenis Vaksin berhasil dihapus.');
    }
}
