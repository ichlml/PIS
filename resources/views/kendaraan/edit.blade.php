@extends('main')

@section('title', 'Ubah Data Kendaraan')

@section('header')
    <div class="section-header">
        <h1>Tambah Data Kendaraan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ url('kendaraan') }}">Data Kendaraan</a></div>
            <div class="breadcrumb-item">Ubah Data Kendaraan</div>
        </div>
    @endsection

    @section('content')
        <h2 class="section-title">Form Ubah Data Kendaraan</h2>
        <p class="section-lead"><i>
                <font color="#f00">*</font> isi data dengan sebenar-benarnya.
            </i></p>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form action="{{ url('kendaraan/' . $data->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Kendaraan <font color="#f00">*</font></label>
                                        <input type="text" name="nama_kendaraan"
                                            class="form-control @error('nama_kendaraan') is-invalid @enderror"
                                            value="{{ old('nama_kendaraan', $data->nama_kendaraan) }}"
                                            placeholder="masukan nama kendaraan" autocomplete="off" autofocus>
                                        @error('nama_kendaraan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No Polisi <font color="#f00">*</font></label>
                                        <input type="text" name="nopol"
                                            class="form-control @error('nopol') is-invalid @enderror"
                                            value="{{ old('nopol', $data->nopol) }}"
                                            placeholder="masukan no polisi kendaraan" autocomplete="off" autofocus>
                                        @error('nopol')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Warna <font color="#f00">*</font></label>
                                        <input type="text" name="warna"
                                            class="form-control @error('warna') is-invalid @enderror"
                                            value="{{ old('warna', $data->warna) }}" placeholder="masukan warna kendaraan"
                                            autocomplete="off" autofocus>
                                        @error('warna')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Merk <font color="#f00">*</font></label>
                                        <input type="text" name="merk"
                                            class="form-control @error('merk') is-invalid @enderror"
                                            value="{{ old('merk', $data->merk) }}" placeholder="masukan merk kendaraan"
                                            autocomplete="off" autofocus>
                                        @error('merk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label>Kelas Kendaraan <font color="#f00">*</font></label>
                                        <select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                                            <option value="">-- pilih --</option>
                                            <option value="A"
                                                {{ old('kelas', $data->kelas) == 'A' ? 'selected' : null }}>
                                                A</option>
                                            <option value="B"
                                                {{ old('kelas', $data->kelas) == 'B' ? 'selected' : null }}>
                                                B</option>
                                            <option value="C"
                                                {{ old('kelas', $data->kelas) == 'C' ? 'selected' : null }}>
                                                C</option>
                                        </select>
                                        @error('kelas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jenis <font color="#f00">*</font></label>
                                        <input type="text" name="jenis"
                                            class="form-control @error('jenis') is-invalid @enderror"
                                            value="{{ old('jenis', $data->jenis) }}" placeholder="masukan Jenis Kendaraan"
                                            autocomplete="off" autofocus>
                                        @error('jenis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis BBM <font color="#f00">*</font></label>
                                        <select name="jenis_bbm"
                                            class="form-control @error('jenis_bbm') is-invalid @enderror">
                                            <option value="">-- pilih --</option>
                                            <option value="PERTAMAX/PERTALITE"
                                                {{ old('jenis_bbm', $data->jenis_bbm) == 'PERTAMAX/PERTALITE' ? 'selected' : null }}>
                                                PERTAMAX/PERTALITE</option>
                                            <option value="BIOSOLAR/DEXLITE"
                                                {{ old('jenis_bbm', $data->jenis_bbm) == 'BIOSOLAR/DEXLITE' ? 'selected' : null }}>
                                                BIOSOLAR/DEXLITE</option>
                                        </select>
                                        @error('jenis_bbm')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Transmisi <font color="#f00">*</font></label>
                                        <select name="transmisi"
                                            class="form-control @error('transmisi') is-invalid @enderror">
                                            <option value="">-- pilih --</option>
                                            <option value="Manual"
                                                {{ old('transmisi', $data->transmisi) == 'Manual' ? 'selected' : null }}>
                                                Manual</option>
                                            <option value="Otomatis"
                                                {{ old('transmisi', $data->transmisi) == 'Otomatis' ? 'selected' : null }}>
                                                Otomatis</option>
                                        </select>
                                        @error('departemen')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status <font color="#f00">*</font></label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option value="">-- pilih --</option>
                                            <option value="Ok"
                                                {{ old('status', $data->status) == 'Ok' ? 'selected' : null }}>
                                                Ok</option>
                                            <option value="Service"
                                                {{ old('status', $data->status) == 'Service' ? 'selected' : null }}>
                                                Service</option>
                                        </select>
                                        @error('departemen')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        Pakis Integrated System
                    </div>
                </div>
            </div>
        </div>

    @endsection
