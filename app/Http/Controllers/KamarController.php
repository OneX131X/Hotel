<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Kamar;
use Alert;
use PDF;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if($request->ajax()){
            $kamar = Kamar::all();
            return DataTables::of($kamar)
            ->editColumn('action', function($kamar){
                return view('partials._action', [
                    'model'             => $kamar,
                    'form_url'          => route('kamar.destroy', $kamar->id),
                    'edit_url'          => route('kamar.edit', $kamar->id),
                    'confirm_message'   => 'Yakin Mau Menghapus Data Ini?'
                ]);
            })
            ->editColumn('id', function($kamar){
                return view('partials._detail', [
                    'model'         => $kamar,
                    'detail_link'   => route('kamar.show', $kamar->id)
                ]);
            })
            //->rawColumn(['action', 'id'])
            ->make(true);
        }

        $html = $builder->columns([
            ['data'  => 'kode', 'name' => 'kode', 'title' => 'Kode Kamar'],
            ['data'  => 'no_kamar', 'name' => 'no_kamar', 'title' => 'No. Kamar'],
            ['data'  => 'lantai', 'name' => 'lantai', 'title' => 'Lantai'],
            ['data'  => 'jenis_kamar', 'name' => 'jenis_kamar', 'title' => 'Jenis Kamar'],
            ['data'  => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => false],
        ]);

        return view('kamar.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kamar.create');
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
                'kode'      => 'required|numeric',
                'no_kamar'  => 'required|numeric'
            ],
            [
                'kode.required'     => 'Kode kamar harus diisi.',
                'no_kamar.required' => 'Nomor kamar harus diisi.'
            ]
        );

        $kamar= Kamar::create([
            'kode'      => $request->kode,
            'no_kamar'  => $request->no_kamar,
            'lantai'    => $request->lantai,
            'jenis_kamar'   => $request->jenis_kamar
        ]);
        toast('Berhasil Menambahkan Data Kamar', 'info');
        return redirect()->route('kamar.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        return view('kamar.show', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(kamar $kamar)
    {
        return view('kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $this->validate($request,
            [
                'kode'      => 'required|numeric',
                'no_kamar'  => 'required|numeric'
            ],
            [
                'kode.required'     => 'Kode kamar harus diisi.',
                'no_kamar.required' => 'Nomor kamar harus diisi.'
            ]
        );

        $kamar= Kamar::create([
            'kode'      => $request->kode,
            'no_kamar'  => $request->no_kamar,
            'lantai'    => $request->lantai,
            'jenis_kamar'   => $request->jenis_kamar
        ]);
        toast('Berhasil Menambahkan Data Kamar', 'info');
        return redirect()->route('kamar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->destroy($kamar->kode);
        toast('Berhasil Hapus Data', 'info');
        return redirect()->route('kamar.index');
    }

    public function cetakKamar()
    {
        $kamar = Kamar::all();
        $pdf = PDF::loadView('kamar.cetak', compact('kamar'))->setPaper('A4', 'landscape');
        return $pdf->stream('cetak kamar.pdf');
    }
}
