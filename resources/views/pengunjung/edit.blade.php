@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Pengunjung</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Pengunjung

                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengunjung.update', $pengunjung->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        

                        <div class="form-group">
                            <label for="" class="mb1">NAMA PENGUNJUNG</label>
                            <input type="text" class="form-control py-4" value="{{ $pengunjung->nama }}" name="nama" placeholder="Masukkan Nama Pengunjung" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">NIK</label>
                            <input type="text" class="form-control py-4" value="{{ $pengunjung->nik }}" name="nik" placeholder="Masukkan nik" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">TANGGAL LAHIR</label>
                            <input type="date" class="form-control py-4" value="{{ $pengunjung->tgl_lahir }}" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir">
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-1">JENIS KELAMIN</label>
                            <select name="jk" class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                    </div>

                        <div class="form-group">
                            <label for="" class="mb1">ASAL</label>
                            <input type="text" class="form-control py-4" value="{{ $pengunjung->asal }}" name="asal" placeholder="Masukkan Asal">
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">KODE KAMAR</label>
                            <input type="text" class="form-control py-4" value="{{ $pengunjung->kode_kamar }}" name="kode_kamar" placeholder="Masukkan Kode Kamar">
                        </div>

                        <div class="form-group">
                           <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                           <a href="{{ route('pengunjung.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
