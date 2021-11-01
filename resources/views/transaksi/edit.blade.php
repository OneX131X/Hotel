@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah transaksi</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah transaksi

                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="" class="mb1">ID</label>
                            <input type="text" class="form-control py-4" value="{{ $transaksi->id }}" name="id" placeholder="Masukkan ID" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">KODE TRANSAKSI</label>
                            <input type="name" class="form-control py-4" value="{{ $transaksi->kode_transaksi }}" name="kode_transaksi" placeholder="Masukkan Kode Transaksi" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">PENGUNJUNG ID</label>
                            <input type="name" class="form-control py-4" value="{{ $transaksi->pengunjung_id }}" name="pengunjung_id" placeholder="Masukkan Pengunjung ID" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">KODE KAMAR</label>
                            <input type="text" class="form-control py-4" value="{{ $transaksi->kode_kamar }}" name="kode_kamar" placeholder="Masukkan Kode Kamar" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">TANGGAL CHECK IN</label>
                            <input type="date" class="form-control py-4" value="{{ $transaksi->tgl_checkin }}" name="tgl_checkin" placeholder="Masukkan Tanggal Check In" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">TANGGAL CHECK OUT</label>
                            <input type="date" class="form-control py-4" value="{{ $transaksi->tgl_checkout }}" name="tgl_checkout" placeholder="Masukkan Tanggal Check Out">
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">STATUS</label>
                            <select name="status" class="form-control">
                                <option value="terisi">Terisi</option>
                                <option value="kosong">Kosong</option>
                            </select>
                    </div>

                        <div class="form-group">
                            <label for="" class="mb1">KETERANGAN</label>
                            <input type="text" class="form-control py-4" value="{{ $transaksi->keterangan }}" name="keterangan" placeholder="Masukkan Keterangan">
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
