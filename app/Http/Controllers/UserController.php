<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Alert;
use PDF;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        user::create($request->all());
        //Alert::success('Berhasil', 'Insert Sukses');
        toast('Berhasil Insert Data', 'info');
        return redirect()->route('pengguna.index');
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
    public function edit(User $pengguna)
    {
        return view('user.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna)
    {
        $pengguna->update($request->all());
        //Alert::success('Berhasil', 'Update Sukses');
        toast('Berhasil Update Data', 'info');
        return redirect()->route('pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        $pengguna->destroy($pengguna->id);
        toast('Berhasil Hapus Data', 'info');
        return redirect()->route('pengguna.index');
    }

    public function print()
    {
        $pengguna = User::all();
        $pdf = PDF::loadView('user.cetak', compact('pengguna'));
        return $pdf->stream('cetak pengguna.pdf');
    }
}
