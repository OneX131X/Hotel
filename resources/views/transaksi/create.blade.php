@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Transaksi</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Transaksi

                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('pesan')

                        <div class="form-group">
                            <label for="" class="mb-1">ID</label>
                            <input type="text" class="form-control py-4" value="{{ old('id') }}" name="id" placeholder="Masukkan ID" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Kode transaksi</label>
                            <input type="text" class="form-control py-4" value="{{ old('kode_transaksi') }}" name="kode_transaksi" placeholder="Masukkan Kode Transaksi">
                        </div>

                        <div class="form-group">
                                <label for="" class="mb-1">Pengunjung ID</label>
                                <input type="text" class="form-control py-4" value="{{ old('pengunjung_id') }}" name="pengunjung_id" placeholder="Masukkan Pengunjung ID" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Kode Kamar</label>
                            <input type="text"  value="{{ old('kode_kamar') }}" name="kode_kamar" placeholder="Masukkan Kode Kamar">
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Tanggal Check in</label>
                            <input type="date"  value="{{ old('tgl_checkin') }}" name="tgl_checkin" placeholder="Masukkan Check In">
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Tanggal Check Out</label>
                            <input type="date"  value="{{ old('tgl_checkout') }}" name="tgl_checkout" placeholder="Masukkan Check Out">
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Status Kamar</label>
                            <select name="status" class="form-control">
                                <option value="terisi">Terisi</option>
                                <option value="kosong">Kosong</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">Status Keterangan</label>
                            <input type="text"  value="{{ old('keterangan') }}" name="keterangan" placeholder="Masukkan Keterangan">
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
                           <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
