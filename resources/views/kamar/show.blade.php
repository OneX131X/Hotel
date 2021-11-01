@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Kamar</h1>

    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Kamar</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>KODE KAMAR</th>
                                <th>NO. KAMAR</th>
                                <th>LANTAI</th>
                                <th>JENIS KAMAR</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($user as $u)
                            <tr>
                                <td>{{ $u->kode_kamar }} </td>
                                <td>{{ $u->no_kamar }} </td>
                                <td>{{ $u->lantai }}</td>
                                <td>{{ $u->jenis_kamar }}</td>
                                <td>
                                    <form action="{{ route('kamar.destroy', $u->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-warning" href="{{ route('kamar.edit', $u->id) }}">Edit</a>

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
