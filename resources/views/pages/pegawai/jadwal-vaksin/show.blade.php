@extends('layouts.base')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb breadcrumb-style2 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ route('jadwal-vaksin.index') }}">Jadwal Vaksinasi</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail Vaksinasi</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-montserrat tx-medium text-truncate">
        Detail Vaksinasi
      </h4>
    </div>
    <div class="d-lg-none mg-t-10">
    </div>
    <div>
        <a href="{{ route('jadwal-vaksin.index') }}"  class="btn btn-white tx-montserrat tx-semibold"><i data-feather="arrow-left" class="wd-10 mg-r-5"></i> Kembali</a>
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
                    <h5 class="tx-medium tx-montserrat mg-b-0">{{ date('l, d F Y', strtotime($jadwal->pelaksanaan)) }}</h5>
                    <p class="mg-b-5">{{ date('H.i', strtotime($jadwal->sesi_mulai)) }} - {{ date('H.i', strtotime($jadwal->sesi_selesai)) }}</p>
                    @if (\Carbon\Carbon::createFromFormat('Y-m-d', $jadwal->pendaftaran_selesai)->isPast())
                        <span class="tx-13"><span class="tx-danger"><i class="far fa-times-circle mg-r-5"></i>Pendaftaran ditutup</span></span>
                    @elseif (\Carbon\Carbon::createFromFormat('Y-m-d', $jadwal->pendaftaran_mulai)->isFuture())
                        <span class="tx-13"><span class="tx-gray-700"><i class="far fa-circle mg-r-5"></i>Pendaftaran belum dibuka</span></span>
                    @else
                        <span class="tx-13"><span class="tx-info"><i class="far fa-play-circle mg-r-5"></i>Pendaftaran dibuka</span></span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body card-list">
            <p class="tx-medium tx-15">Tentang Vaksinasi Ini</p>
            <div class="card-list-text">
              <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Vaksinator</span> 
              <p class="mg-b-0">{{ $jadwal->vaksinator->nama }}</p>
            </div>
            <div class="card-list-text">
              <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Jenis Vaksin</span> 
              <p class="mg-b-0">{{ $jadwal->vaksin->nama }}</p>
            </div>
            <div class="card-list-text">
              <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Pendaftaran</span> 
              <p class="mg-b-0">{{ date('d F Y', strtotime($jadwal->pendaftaran_mulai)) }} - {{ date('d F Y', strtotime($jadwal->pendaftaran_mulai)) }}</p>
            </div>
            <hr class="mg-t-20 mg-b-20">
            <p class="tx-medium tx-15">Pelaksanaan</p>
            <div class="card-list-text">
              <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Tanggal Vaksinasi</span> 
              <p class="mg-b-0">{{ date('d F Y', strtotime($jadwal->pelaksanaan)) }}</p>
            </div>
            <div class="card-list-text">
              <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Sesi Vaksinasi</span> 
              <p class="mg-b-0">{{ date('H.i', strtotime($jadwal->sesi_mulai)) }} - {{ date('H.i', strtotime($jadwal->sesi_selesai)) }}</p>
            </div>
            <div class="card-list-text">
              <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Lokasi</span> 
              <p class="mg-b-0">{{ $jadwal->lokasi }}</p>
            </div>
            <div class="card-list-text">
              <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Kuota</span> 
              <p class="mg-b-0">{{ $jadwal->kuota }} orang</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-12 mg-b-10 pd-l-5 pd-r-5 ht-70 ht-md-70 ht-lg-70">
      </div>
      <div class="col-sm-12 col-lg-12 mg-b-10 d-flex justify-content-center">
          <div class="card pos-fixed z-index-10 b-40 shadow wd-90p wd-md-80p wd-lg-70p animated slideInUp">
              <div class="card-body card-alert-success d-flex justify-content-between align-items-center">
                  <span class="tx-montserrat tx-medium d-flex align-items-center"><i class="fa-lg fas fa-check-circle mg-l-10 mg-r-15 tx-success"></i>Kuota tersedia.</span>
                  <form action="{{ route('jadwal-vaksin.store') }}" method="POST" class="z-index-10">
                    @csrf
                    <input type="hidden" name="jadwal_vaksin_id" value="{{ $jadwal->id }}" />
                    <button type="submit" class="btn btn-its tx-montserrat tx-semibold">Daftar Vaksinasi</button>
                  </form>
              </div>
          </div>
      </div>


</div><!-- row -->
@endsection

@push('js')
  <script>
    $(document).on('click','.btn-delete',function(){
      let id = $(this).attr('data-id');
      $('#id').val(id);
    });
  </script>
@endpush