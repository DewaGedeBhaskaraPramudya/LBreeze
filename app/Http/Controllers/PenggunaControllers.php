<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peng = Pengguna::latest()->paginate(5);
        return view ('peng.index',compact('peng'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('peng.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Nama' => 'required',
            'ticket_id' => 'required',
            'Ticket' => 'required',
            'Alamat' => 'required',
        ]);
        Pengguna::create($request->all());

        return redirect()->route('peng.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $peng)
    {
        //
        return view('peng.show', compact('peng'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $peng)
    {
        return view('peng.edit', compact('peng'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $peng)
    {
        $request->validate([
            'Nama' => 'required',
            'ticket_id' => 'required',
            'Ticket' => 'required',
            'Alamat' => 'required',
        ]);

        $peng->update($request->all());
        return redirect()->route('peng.index')->with('success','Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $peng)
    {
        $peng->delete();
        return redirect()->route('peng.index')->with('success','Data Berhasil di Hapus');
    }
}
