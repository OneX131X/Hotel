@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Pengguna</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah User

                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kamar.update', $kamar->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @include('pesan')

                        <div class="form-group">
                            <label for="" class="mb1">Kode Kamar</label>
                            <input type="text" class="form-control py-4" value="{{ is_null($kamar) ? old('kode') : $kamar->kode }}" name="kode" placeholder="Masukkan Kode Kamar" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">No. Kamar</label>
                            <input type="name" class="form-control py-4" value="{{ is_null($kamar) ? old('no_kamar') : $kamar->no_kamar }}" name="no_kamar" placeholder="Masukkan Nomor Kamar" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb1">Lantai</label>
                            <input type="text" class="form-control py-4" value="{{ is_null($kamar) ? old('lantai') : $kamar->lantai }}" name="lantai" placeholder="Masukkan Letak Lantai" required>
                        </div>

                        <div class="form-group">
                                <label for="" class="mb-1">Jenis Kamar</label>
                                <select name="jenis_kamar" class="form-control">
                                    <option value="kamar_L" {{ $kamar->jenis_kamar == 'kamar_L' ? 'selected' : '' }} >Kamar Laki-laki</option>
                                    <option value="kamar_P" {{ $kamar->jenis_kamar == 'kamar_P' ? 'selected' : '' }}>Kamar Perempuan</option>
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
