@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Transaksi</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi
                            <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-success float-right">Tambah Data</a>
                            <a href="{{ route('transaksi.cetak') }}" class="btn btn-sm btn-primary float-right">Cetak transaksi</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive"></div>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>KODE TRANSAKSI</th>
                                <th>PENGUNJUNG ID</th>
                                <th>KODE KAMAR</th>
                                <th>TANGGAL CHECK IN</th>
                                <th>TANGAL CHECK OUT</th>
                                <th>STATUS</th>
                                <th>KETERANGAN</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($user as $u)
                            <tr>
                                <td>{{ $u->id }} </td>
                                <td>{{ $u->kode_transaksi }} </td>
                                <td>{{ $u->pengunjung_id }}</td>
                                <td>{{ $u->kode_kamar }}</td>
                                <td>{{ $u->tgl_checkin }}</td>
                                <td>{{ $u->tgl_checkout }}</td>
                                <td>{{ $u->status }}</td>
                                <td>{{ $u->keterangan }}</td>
                                <td>
                                    <form action="{{ route('transaksi.destroy', $u->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-warning" href="{{ route('transaksi.edit', $u->id) }}">Edit</a>

                                        <input class="btn btn-sm btn-danger" type="submit" value='Hapus'>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">Tidak Ada Data...</td>
                            </tr>
                            @endforelse
                        </table>
                </div>
            </div>

        </div>
    </div>
@endsection
