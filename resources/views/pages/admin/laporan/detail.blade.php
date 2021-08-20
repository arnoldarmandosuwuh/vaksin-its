@extends('layouts.base')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb breadcrumb-style2 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ route('laporan.index') }}">Laporan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail Laporan</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-montserrat tx-medium text-truncate">
        Detail Laporan
      </h4>
    </div>
    <div class="d-lg-none mg-t-10">
    </div>
    <div>
        <a href="{{ route('laporan.index') }}"  class="btn btn-white tx-montserrat tx-semibold"><i data-feather="arrow-left" class="wd-10 mg-r-5"></i> Kembali</a>
    </div>
</div>

<div class="row row-xs">
  <div class="col-sm-12 col-lg-12 mg-b-10">
    <div class="card">
      <div class="card-header">
        <div class="row row-xs">
          <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="tx-medium tx-montserrat mg-b-0">{{ $laporan->pegawai->users->name }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body card-list">
        <p class="tx-medium tx-15">Peserta Vaksinasi</p>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Nama</span> 
          <p class="mg-b-0">{{ $laporan->pegawai->users->name }}</p>
        </div>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">NIK</span> 
          <p class="mg-b-0">{{ $laporan->pegawai->nik }}</p>
        </div>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Kehadiran</span> 
          @if ($laporan->hadir == 0)
            <p class="mg-b-0">-</p>
          @elseif ($laporan->hadir == 1)
          @else
            <p class="mg-b-0">Tidak Hadir</p>
          @endif
        </div>
        <hr class="mg-t-20 mg-b-20">
        <p class="tx-medium tx-15">Tentang Vaksinasi Ini</p>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Vaksinator</span> 
          <p class="mg-b-0">{{ $laporan->jadwal->vaksinator->nama }}</p>
        </div>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Jenis Vaksin</span> 
          <p class="mg-b-0">{{ $laporan->jadwal->vaksin->nama }}</p>
        </div>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Pendaftaran</span> 
          <p class="mg-b-0">{{ date('d F Y', strtotime($laporan->jadwal->pendaftaran_mulai)) }} - {{ date('d F Y', strtotime($laporan->jadwal->pendaftaran_selesai)) }}</p>
        </div>
        <hr class="mg-t-20 mg-b-20">
        <p class="tx-medium tx-15">Pelaksanaan</p>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Tanggal Vaksinasi</span> 
          <p class="mg-b-0">{{ date('d F Y', strtotime($laporan->jadwal->pelaksanaan)) }}</p>
        </div>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Sesi Vaksinasi</span> 
          <p class="mg-b-0">{{ date('H:i', strtotime($laporan->jadwal->sesi_mulai)) }} - {{ date('H:i', strtotime($laporan->jadwal->sesi_selesai)) }}</p>
        </div>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Lokasi</span> 
          <p class="mg-b-0">{{ $laporan->jadwal->lokasi }}</p>
        </div>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Kuota</span> 
          <p class="mg-b-0">{{ $laporan->jadwal->kuota }} orang</p>
        </div>
        <div class="card-list-text">
          <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Vaksinasi Ke</span> 
          <p class="mg-b-0">{{ $laporan->vaksin_ke }}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-12 mg-b-10">
    <div class="card">
      <div class="card-header">
        <div class="row row-xs">
          <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="tx-medium tx-montserrat mg-b-0">KIPI</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body pd-0">
        <div class="table-responsive">
          <table class="table table-borderless table-hover">
            <thead>
              <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                <th class="wd-15p th-its">Tanggal Kejadian</th>
                <th class="wd-40p th-its">Gejala</th>
                <th class="wd-30p th-its">Tindakan</th>
                <th class="wd-15p th-its">Hubungi Dokter</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="td-its tx-medium align-middle border-bottom">20 Mar 2021</td>
                <td class="td-its align-middle border-bottom">Pilek</td>
                <td class="td-its align-middle border-bottom">Obat pilek</td>
                <td class="td-its align-middle border-bottom">Sudah</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div><!-- row -->
@endsection

@section('modal')
<div class="modal fade effect-scale" id="editkehadiran" tabindex="-1" role="dialog" aria-labelledby="modalmyfile" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="tx-montserrat tx-medium" id="editkehadiranLabel">Edit Kehadiran</h5>
      </div>
      <form>
        <div class="modal-body pd-t-0">
          <div class="form-group">
            <div class="row">
              <div class="col-4">
                <div class="custom-control custom-radio">
                  <input type="radio" id="hadir_ya" name="is_hadir" class="custom-control-input" required>
                  <label class="custom-control-label" for="hadir_ya">Hadir</label>
                </div>
              </div>
              <div class="col-4">
              <div class="custom-control custom-radio">
                  <input type="radio" id="hadir_tidak" name="is_hadir" class="custom-control-input">
                  <label class="custom-control-label" for="hadir_tidak">Tidak hadir</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white tx-montserrat tx-semibold" data-dismiss="modal">Batalkan</button>
          <button type="submit" class="btn btn-its tx-montserrat tx-semibold mg-l-5">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
  
@endsection