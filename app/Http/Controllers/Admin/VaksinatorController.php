<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vaksinator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VaksinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaksinator = Vaksinator::all();
        return view('pages.admin.vaksinator.index', [
            'vaksinator' => $vaksinator,
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
            $vaksin = Vaksinator::create([
                'nama' => $request->nama
            ]);

            if ($vaksin) {
                return redirect()->route('vaksinator.index')->with('success', 'Vaksinator berhasil ditambahkan.');
            } else {
                return back()->with('errors', 'Vaksinator gagal ditambahkan.');
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
        $vaksin = Vaksinator::findOrFail($request->id);
        $vaksin->delete();

        return redirect()->route('vaksinator.index')->with('success', 'Vaksinator berhasil dihapus.');
    }
}
