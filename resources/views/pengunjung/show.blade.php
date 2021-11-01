@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Pengunjung</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Pengunjung
                            <a href="{{ route('pengunjung.create') }}" class="btn btn-sm btn-success float-right">Tambah Data</a>
                            <a href="{{ route('pengunjung.cetak') }}" class="btn btn-sm btn-primary float-right">Cetak pengunjung</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive"></div>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>USER ID</th>
                                <th>NAMA LENGKAP</th>
                                <th>NIK</th>
                                <th>TANGGAL LAHIR</th>
                                <th>JENIS KELAMIN</th>
                                <th>ASAL</th>
                                <th>KODE KAMAR</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($user as $u)
                            <tr>
                                <td>{{ $u->id }} </td>
                                <td>{{ $u->user_id }}</td>
                                <td>{{ $u->name.' '. $u->last_name}}</td>
                                <td>{{ $u->nik }}</td>
                                <td>{{ $u->tgl_lahir }}</td>
                                <td>{{ $u->jk }}</td>
                                <td>{{ $u->asal }}</td>
                                <td>{{ $u->kode_kamar }}</td>
                                <td>
                                    <form action="{{ route('pengunjung.destroy', $u->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-warning" href="{{ route('pengunjung.edit', $u->id) }}">Edit</a>

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
