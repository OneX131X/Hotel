@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Transaksi</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel transaksi
                            <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-success float-right">Tambah Data transaksi</a>
                            <a href="{{ route('transaksi.cetak') }}" class="btn btn-sm btn-primary float-right">Cetak transaksi</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive"></div>
                        {!! $html->table(['class' => 'table table-bordered table-striped table-hover dataTable']) !!}
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    {!! $html->scripts() !!}
@endpush
