<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Transaksi;
use Alert;
use PDF;
use Kamar;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if($request->ajax()){
            $transaksi = Transaksi::all();
            return DataTables::of($transaksi)
            ->editColumn('action', function($transaksi){
                return view('partials._action', [
                    'model'             => $transaksi,
                    'form_url'          => route('transaksi.destroy', $transaksi->id),
                    'edit_url'          => route('transaksi.edit', $transaksi->id),
                    'confirm_message'   => 'Yakin Mau Menghapus Data Ini?'
                ]);
            })
            ->editColumn('id', function($transaksi){
                return view('partials._detail', [
                    'model'         => $transaksi,
                    'detail_link'   => route('transaksi.show', $transaksi->id)
                ]);
            })
            //->rawColumn(['action', 'id'])
            ->make(true);
        }

        $html = $builder->columns([
            ['data'  => 'kode_transaksi', 'name' => 'kode_transaksi', 'title' => 'Kode Transaksi'],
            ['data'  => 'pengunjung_id', 'name' => 'pengunjung_id', 'title' => 'Pengunjung ID'],
            ['data'  => 'kode_kamar', 'name' => 'kode_kamar', 'title' => 'Kode Kamar'],
            ['data'  => 'tgl_checkin', 'name' => 'tgl_checkin', 'title' => 'Tanggal Checkin'],
            ['data'  => 'tgl_checkout', 'name' => 'tgl_checkout', 'title' => 'Tanggal Checkout'],
            ['data'  => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data'  => 'keterangan', 'name' => 'keterangan', 'title' => 'Keterangan'],
            ['data'  => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => false],
        ]);

        return view('transaksi.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create');
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
            'id'      => 'required|numeric',
            'pengunjung_id'  => 'required|numeric'
        ],
        [
            'id.required'     => 'id pengunjung harus diisi.',
            'pengunjung.required' => 'pengunjung id harus diisi.'
        ]
    );

    $transaksi = Transaksi::create([
        'id'      => $request->id,
        'pengunjung_id'  => $request->pengunjung_id,
        'kode_kamar'    => $request->kode_kamar,
        'tgl_checkin'   => $request->tgl_checkin,
        'tgl_checkout'      => $request->tgl_checkout,
        'asal'  => $request->asal,
        'keterangan'    => $request->keterangan
    ]);

    /*$kamar = Kamar::create([
        'kode_kamar'    => $request->kode_kamar
    ]);*/

    toast('Berhasil Menambahkan Data Transaksi', 'info');
    return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $this->validate($request,
        [
            'id'      => 'required|numeric',
            'user_id'  => 'required|numeric'
        ],
        [
            'id.required'     => 'id pengunjung harus diisi.',
            'user_id.required' => 'user id harus diisi.'
        ]
    );

    $transaksi= Transaksi::create([
        'id'      => $request->id,
        'pengunjung_id'  => $request->pengunjung_id,
        'kode_kamar'    => $request->kode_kamar,
        'tgl_checkin'   => $request->tgl_checkin,
        'tgl_checkout'      => $request->tgl_checkout,
        'asal'  => $request->asal,
        'keterangan'    => $request->keterangan
    ]);
    toast('Berhasil Merubah Data Transaksi', 'info');
    return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->destroy($transaksi->id);
        toast('Berhasil Hapus Data', 'info');
        return redirect()->route('transaksi.index');
    }

    public function cetakTransaksi()
    {
        $transaksi = Transaksi::all();
        $pdf = PDF::loadView('transaksi.cetak', compact('transaksi'))->setPaper('A4', 'landscape');
        return $pdf->stream('cetak transaksi.pdf');
    }
}
