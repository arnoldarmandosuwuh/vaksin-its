@extends('layouts.base')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb breadcrumb-style2 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ route('jadwal-vaksinasi.index') }}">Jadwal Vaksinasi</a></li>
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
        <a href="{{ route('jadwal-vaksinasi.index') }}"  class="btn btn-white tx-montserrat tx-semibold"><i data-feather="arrow-left" class="wd-10 mg-r-5"></i> Kembali</a>
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
              <div class="col-2 col-sm-2 col-lg-2 d-flex align-items-center justify-content-end">
                <div class="dropdown dropdown-custom">
                  <button class="btn btn-white tx-montserrat tx-semibold d-none d-lg-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="more-vertical" class="wd-10 mg-r-5"></i>Pilihan
                  </button>
                  <button class="btn btn-white btn-icon d-lg-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('jadwal-vaksinasi.edit', $jadwal->id) }}"><i data-feather="edit"></i>Edit</a>
                    <a class="dropdown-item btn-delete" href="#hapusvaksinasi" data-toggle="modal" data-animation="effect-scale" data-id={{ $jadwal->id }}><i data-feather="trash"></i>Hapus</a>
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

      <div class="col-sm-12 col-lg-12 mg-b-10">
        <div class="card">
          <div class="card-header">
            <div class="row row-xs">
              <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
                <div class="d-flex align-items-center">
                  <div>
                    <h5 class="tx-medium tx-montserrat mg-b-0">Peserta Vaksinasi</h5>
                  </div>
                </div>
              </div>
              <div class="col-2 col-sm-2 col-lg-2 d-flex align-items-center justify-content-end">
                <a href="{{ route('jadwal-vaksinasi.peserta', $jadwal->id) }}" class="btn btn-white tx-montserrat tx-semibold float-right d-none d-lg-block"><i data-feather="edit" class="wd-10 mg-r-5"></i> Edit Peserta</a>
                <a href="{{ route('jadwal-vaksinasi.peserta', $jadwal->id) }}" class="btn btn-white btn-icon tx-montserrat tx-medium float-right d-lg-none"><i data-feather="edit"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Peserta yang sudah dipilih</span> 
            <p class="mg-b-0">{{ $jadwal->peserta->count() }} orang</p>
          </div>
        </div>
      </div>

      <div class="modal fade effect-scale" id="hapusvaksinasi" tabindex="-1" role="dialog" aria-labelledby="hapusvaksinasi" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content tx-14 bg-white">
            <div class="modal-body">
              <h5 class="tx-montserrat tx-medium">Apakah Anda yakin ingin menghapus jadwal vaksinasi ini?</h5>
              <span>Tindakan ini tidak dapat dibatalkan.</span>
            </div>
            <div class="modal-footer bd-t-0">
              <form action="{{ route('jadwal-vaksinasi.destroy', 'id') }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" id="id">
                <a href="#" data-toggle="modal" data-animation="effect-scale" class="btn btn-white tx-montserrat tx-semibold" data-dismiss="modal">Batalkan</a>
                <button type="submit" class="btn btn-its tx-montserrat tx-semibold mg-l-5">Hapus</button>
              </form>
            </div>
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