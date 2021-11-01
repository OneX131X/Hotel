@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Kamar</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kamar

                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('pesan')

                        <div class="form-group">
                            <label for="" class="mb1">Kode Kamar</label>
                            <input type="text" class="form-control py-4" value="{{ old('kode') }}" name="kode" placeholder="Masukkan Kode Kamar" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">No. Kamar</label>
                            <input type="name" class="form-control py-4" value="{{ old('no_kamar') }}" name="no_kamar" placeholder="Masukkan Nomor Kamar" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">Lantai</label>
                            <input type="text" class="form-control py-4" value="{{ old('lantai') }}" name="lantai" placeholder="Masukkan Letak Lantai" required>
                        </div>

                        <div class="form-group">
                                <label for="" class="mb-1">Jenis Kamar</label>
                                <select name="jenis_kamar" class="form-control">
                                    <option value="kamar_L">Kamar Laki-laki</option>
                                    <option value="kamar_P">Kamar Perempuan</option>
                                </select>
                        </div>

                        <div class="form-group">
                           <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                           <a href="{{ route('kamar.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
