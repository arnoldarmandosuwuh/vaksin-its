@extends('layouts.base')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb breadcrumb-style2 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Jadwal Vaksinasi</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-montserrat tx-medium text-truncate">
        Jadwal Vaksinasi
      </h4>
    </div>
    <div class="d-lg-none mg-t-10">
    </div>
    <div>
    </div>
</div>

<div class="row row-xs">
    <div class="col-sm-12 col-lg-12">
        <div class="card">
          <div class="card-body card-list">

            @foreach ($jadwal as $item )
              <div class="card-list-item">
                @if (\Carbon\Carbon::createFromFormat('Y-m-d', $item->pendaftaran_mulai)->isPast() && \Carbon\Carbon::createFromFormat('Y-m-d', $item->pendaftaran_selesai)->isFuture())
                  <a href="{{ route('jadwal-vaksin.show', $item->id) }}">
                @else
                  <a href="#">
                @endif
                  <div class="d-flex justify-content-between align-items-center sc-link">
                    <div class="media">
                      <div class="wd-40 ht-40 bg-its-icon tx-color-its mg-r-15 mg-md-r-15 d-flex align-items-center justify-content-center rounded-its"><i data-feather="calendar"></i></div>
                      <div class="media-body align-self-center">
                        <p class="tx-montserrat tx-semibold mg-b-0 tx-color-02">{{ date('l, d F Y', strtotime($item->pelaksanaan)) }}</p> 
                        <p class="tx-color-03 tx-13">{{ date('H.i', strtotime($item->sesi_mulai)) }} - {{ date('H.i', strtotime($item->sesi_selesai)) }}</p>
                        @if (\Carbon\Carbon::createFromFormat('Y-m-d', $item->pendaftaran_selesai)->isPast())
                            <span class="tx-13"><span class="tx-danger"><i class="far fa-times-circle mg-r-5"></i>Pendaftaran ditutup</span></span>
                        @elseif (\Carbon\Carbon::createFromFormat('Y-m-d', $item->pendaftaran_mulai)->isFuture())
                            <span class="tx-13"><span class="tx-gray-700"><i class="far fa-circle mg-r-5"></i>Pendaftaran belum dibuka</span></span>
                        @else
                            <span class="tx-13"><span class="tx-info"><i class="far fa-play-circle mg-r-5"></i>Pendaftaran dibuka</span></span>
                        @endif
                      </div>
                    </div>
                    <div class="btn btn-icon btn-its-icon btn-hover">
                      <i data-feather="chevron-right"></i>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>

</div><!-- row -->
@endsection