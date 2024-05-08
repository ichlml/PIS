@extends('main')

@section('title', 'Kendaraan')

@section('header')
    <div class="section-header">
        <h1>Data Kendaraan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Home</a></div>
            <div class="breadcrumb-item">Kendaraan</a></div>
            {{-- <div class="breadcrumb-item">Data Pegawai</div> --}}
        </div>
    @endsection

    @section('content')

        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h4></h4>
                        <div class="card-header-action">
                            <a href="{{ url('kendaraan/create') }}" class="btn btn-icon btn-md btn-primary"><i
                                    class="fas fa-plus"></i> Tambah
                                Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Polisi</th>
                                        <th>Nama Kendaraan</th>
                                        <th>Merk</th>
                                        <th>Jenis</th>
                                        <th>Transmisi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $items)
                                        <tr>
                                            <td>{{ $loop->iteration }}. </td>
                                            <td>{{ $items->nopol }}</td>
                                            <td>{{ $items->nama_kendaraan }}</td>
                                            <td>{{ $items->merk }}</td>
                                            <td>{{ $items->jenis }}</td>
                                            <td>{{ $items->transmisi }}</td>
                                            @if ($items->status == 'Ok')
                                                <td><button class="btn btn-sm btn-success">{{ $items->status }}</button>
                                                </td>
                                            @else
                                                <td><button class="btn btn-sm btn-danger">{{ $items->status }}</button></td>
                                            @endif
                                            <td class="text-center">
                                                <a href="{{ url('kendaraan/' . $items->id . '/edit') }}"
                                                    class="btn btn-icon btn-sm btn-primary">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <form action="{{ url('kendaraan/' . $items->id) }}" method="post"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Apakah anda yakin hapus data ini?')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-icon btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endsection
