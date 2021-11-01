<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Pengunjung;
use Users;
use Alert;
use PDF;
use Kamar;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if($request->ajax()){
            $pengunjung = Pengunjung::all();
            return DataTables::of($pengunjung)
            ->editColumn('action', function($pengunjung){
                return view('partials._action', [
                    'model'             => $pengunjung,
                    'form_url'          => route('pengunjung.destroy', $pengunjung->id),
                    'edit_url'          => route('pengunjung.edit', $pengunjung->id),
                    'confirm_message'   => 'Yakin Mau Menghapus Data Ini?'
                ]);
            })
            ->editColumn('id', function($pengunjung){
                return view('partials._detail', [
                    'model'         => $pengunjung,
                    'detail_link'   => route('pengunjung.show', $pengunjung->id)
                ]);
            })
            //->rawColumn(['action', 'id'])
            ->make(true);
        }

        $html = $builder->columns([
            ['data'  => 'user_id', 'name' => 'user_id', 'title' => 'User ID'],
            ['data'  => 'nama', 'name' => 'nama', 'title' => 'Nama'],
            ['data'  => 'nik', 'name' => 'nik', 'title' => 'NIK'],
            ['data'  => 'tgl_lahir', 'name' => 'tgl_lahir', 'title' => 'Tanggal Lahir'],
            ['data'  => 'jk', 'name' => 'jk', 'title' => 'Jenis Kelamin'],
            ['data'  => 'asal', 'name' => 'asal', 'title' => 'Asal'],
            ['data'  => 'kode_kamar', 'name' => 'kode_kamar', 'title' => 'Kode Kamar'],
            ['data'  => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => false],
        ]);

        return view('pengunjung.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengunjung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'user_id'  => 'required|numeric'
        ],
        [
            'user_id.required' => 'user id harus diisi.'
        ]
    );

    $pengunjung= Pengunjung::create([
        'user_id'  => $request->user_id,
        'nama'    => $request->nama,
        'nik'   => $request->nik,
        'tgl_lahir'      => $request->tgl_lahir,
        'jk'  => $request->jk,
        'asal'    => $request->asal,
        'kode_kamar'   => $request->kode_kamar
    ]);

    /*$kamar = Kamar::create([
        'kode_kamar'    => $request->kode_kamar
    ]);*/

    toast('Berhasil Menambahkan Data Pengunjung', 'info');
    return redirect()->route('pengunjung.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengunjung $pengunjung)
    {
        return view('pengunjung.show', compact('pengunjung'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengunjung $pengunjung)
    {
        return view('pengunjung.edit', compact('pengunjung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengunjung $pengunjung)
    {
        $this->validate($request,
        [
            'user_id'  => 'required|numeric'
        ],
        [
            'user_id.required' => 'user id harus diisi.'
        ]

        );
        $pengunjung= Pengunjung::update([
           'nama'          => $request->nama,
           'nik'           => $request->nik,
           'tgl_lahir'     => $request->tgl_lahir,
           'jk'            => $request->jk,
           'asal'          => $request->asal,
           'kode_kamar'    => $request->kode_kamar
       ]);
       toast('Berhasil Menambahkan Data Pengunjung', 'info');
       return redirect()->route('pengunjung.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengunjung $pengunjung)
    {
        $pengunjung->destroy($pengunjung->id);
        toast('Berhasil Hapus Data', 'info');
        return redirect()->route('pengunjung.index');
    }

    public function cetakPengunjung()
    {
        $pengunjung = Pengunjung::all();
        $pdf = PDF::loadView('pengunjung.cetak', compact('pengunjung'))->setPaper('A4', 'landscape');
        return $pdf->stream('cetak pengunjung.pdf');
    }

}
