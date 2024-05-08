@extends('main')

@section('title', 'Notif Piutang')

@section('header')
    <div class="section-header">
        <h1>Data Piutang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Home</a></div>
            <div class="breadcrumb-item">Notif Piutang</a></div>
            {{-- <div class="breadcrumb-item">Data Pegawai</div> --}}
        </div>
    @endsection

    @section('content')

        </section>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h4></h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            IMPORT EXCEL
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">IMPORT EXCEL</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('notifPiutang/importExcel') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="file" name="file" class="form-input">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">IMPORT EXCEL</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>No HP</th>
                                        <th>Saldo Akhir</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i)
                                        <tr>
                                            <td>{{ $loop->iteration }}. </td>
                                            <td>{{ $i->nama_pelanggan }}</td>
                                            <td>{{ $i->nohp }}</td>
                                            <td>Rp. {{ number_format($i->saldo_akhir, 2) }}</td>
                                            @if ($i->status == 1)
                                                <td><button class="btn btn-sm btn-success">Terkirim</button></td>
                                            @else
                                                <td><button class="btn btn-sm btn-danger">Belum Dikirim</button></td>
                                            @endif
                                            <td class="text-center">
                                                <a href="{{ url('notifPiutang/send/' . $i->id) }}"
                                                    class="btn btn-icon btn-sm btn-primary">
                                                    <i class="fab fa-whatsapp"></i> Send Message
                                                </a>
                                                <form action="{{ url('pegawai/' . $i->id) }}" method="post"
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
