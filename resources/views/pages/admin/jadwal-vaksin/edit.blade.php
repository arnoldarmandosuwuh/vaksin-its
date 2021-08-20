@extends('layouts.base')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb breadcrumb-style2 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ route('jadwal-vaksinasi.index') }}">Vaksinasi Tersedia</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Vaksinasi</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-montserrat tx-medium text-truncate">
        Tambah Vaksinasi
      </h4>
    </div>
    <div class="d-lg-none mg-t-10">
    </div>
    <div>
        <a href="{{ route('jadwal-vaksinasi.index') }}"  class="btn btn-white tx-montserrat tx-semibold"><i data-feather="arrow-left" class="wd-10 mg-r-5"></i> Kembali</a>
    </div>
</div>

<div class="row row-xs">
    <div class="col-sm-12 col-lg-12 mg-b-10">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('jadwal-vaksinasi.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
              <p class="tx-medium tx-15">Tentang Vaksinasi Ini</p>
              <div class="form-group">
                <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Vaksinator</label>
                <select class="form-control select2" name="vaksinator_id" required>
                  <option label="Pilih"></option>
                  @foreach ($vaksinators as $vaksinator)
                      @if ($vaksinator->id == $jadwal->vaksinator_id)
                        <option value="{{ $vaksinator->id }}" selected>{{ $vaksinator->nama }}</option>                        
                      @else
                        <option value="{{ $vaksinator->id }}">{{ $vaksinator->nama }}</option>
                      @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Jenis Vaksin</label>
                <select class="form-control select2" name="vaksin_id" required>
                  <option label="Pilih"></option>
                  @foreach ($vaksins as $vaksin)
                    @if ($vaksin->id == $jadwal->vaksin_id)
                      <option value="{{ $vaksin->id }}" selected>{{ $vaksin->nama }}</option>
                    @else
                      <option value="{{ $vaksin->id }}">{{ $vaksin->nama }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Pendaftaran dimulai</label>
                    <input type="date" id="pendaftaran_mulai" name="pendaftaran_mulai" class="form-control" value="{{ $jadwal->pendaftaran_mulai }}" required>
                  </div>
                  <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Pendaftaran selesai</label>
                    <input type="date" id="pendaftaran_selesai" name="pendaftaran_selesai" class="form-control" value="{{ $jadwal->pendaftaran_selesai }}" required>
                  </div>
                </div>
              </div>
              <hr class="mg-t-20 mg-b-20">
              <p class="tx-medium tx-15">Pelaksanaan</p>
              <div class="form-group">
                <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Tanggal Vaksinasi</label>
                <input type="date" id="pelaksanaan" name="pelaksanaan" class="form-control" value="{{ $jadwal->pelaksanaan }}" required>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Sesi Vaksinasi Dimulai</label>
                    <input type="time" id="sesi_mulai" name="sesi_mulai" class="form-control" value="{{ $jadwal->sesi_mulai }}" required>
                  </div>
                  <div class="col-6">
                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Sesi Vaksinasi Selesai</label>
                    <input type="time" id="sesi_selesai" name="sesi_selesai" class="form-control" value="{{ $jadwal->sesi_selesai }}" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Tempat vaksinasi" maxlength="100" value="{{ $jadwal->lokasi }}" required>
              </div>
              <div class="form-group">
                <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Kuota</label>
                <input type="number" id="kuota" name="kuota" class="form-control" placeholder="Jumlah peserta" value="{{ $jadwal->kuota }}" required>
              </div>
              
              <button class="btn btn-its tx-montserrat tx-semibold float-right" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>

</div><!-- row -->
@endsection