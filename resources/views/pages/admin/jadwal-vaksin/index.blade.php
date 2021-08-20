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
        <a href="{{ route('jadwal-vaksinasi.create') }}"  class="btn btn-its tx-montserrat tx-semibold"><i data-feather="plus" class="wd-10 mg-r-5 tx-color-its2"></i> Tambah</a>
    </div>
</div>

<div class="row row-xs">
    <div class="col-sm-12 col-lg-12">
        <div class="card">
          <div class="card-body card-list">

            @foreach ($jadwal as $item )
              <div class="card-list-item">
                <a href="vaksinasi-detail.html">
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

@push('js')
    <script>
        $(function(){
        'use strict'

        $('#example1').DataTable({
            language: {
            searchPlaceholder: 'Cari',
            sSearch: '',
            lengthMenu: '_MENU_ data/halaman',
            emptyTable:         'Tidak ada data yang tersedia pada tabel ini',
            zeroRecords:        'Tidak ditemukan data yang sesuai',
            info:               'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
            infoEmpty:          'Menampilkan 0 sampai 0 dari 0 entri',
            infoFiltered:       '(disaring dari _MAX_ entri keseluruhan)',
            paginate: {
                first: "<i class='fas fa-angle-double-left'></i>",
                last: "<i class='fas fa-angle-double-right'></i>",
                previous: "<i class='fas fa-angle-left'></i>",
                next: "<i class='fas fa-angle-right'></i>"
            },
            }
        });

          // Select2
          $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>
@endpush