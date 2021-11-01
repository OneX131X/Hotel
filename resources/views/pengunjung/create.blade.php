@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Pengunjung</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengunjung

                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('pesan')

                        <div class="form-group">
                            <label for="" class="mb-1">User ID</label>
                            <input type="text" class="form-control py-4" value="{{ old('user_id') }}" name="user_id" placeholder="Masukkan User ID" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Nama Pengunjung</label>
                            <input type="text" class="form-control py-4" value="{{ old('nama') }}" name="nama" placeholder="Masukkan Nama">
                        </div>

                        <div class="form-group">
                                <label for="" class="mb-1">NIK</label>
                                <input type="text" class="form-control py-4" value="{{ old('nik') }}" name="nik" placeholder="Masukkan NIK" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Tanggal Lahir</label>
                            <input type="date"  value="{{ old('tgl_lahir') }}" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir">
                        </div>

                        <div class="form-group">
                                <label for="" class="mb-1">Jenis Kelamin</label>
                                <select name="jk" class="form-control">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Asal</label>
                            <input type="text" class="form-control py-4" value="{{ old('asal') }}" name="asal" placeholder="Masukkan Asal">
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Kode Kamar</label>
                            <select name="jk" class="form-control">
                                <option value="{{ $kamar ?? 'kode_kamar' }}"></option>
                            </select>
                    </div>

                        <div class="form-group">
                           <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                           <a href="{{ route('pengguna.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
