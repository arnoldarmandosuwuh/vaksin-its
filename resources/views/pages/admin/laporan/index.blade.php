@extends('layouts.base')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb breadcrumb-style2 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Laporan</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-montserrat tx-medium text-truncate">
        Laporan
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
          <div class="card-body pd-0 table-responsive">
            <table id="example1" class="table table-borderless mg-0">
              <thead>
                <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                  <th class="wd-25p th-its" style="border-bottom: none !important"><span>Pegawai</span></th>
                  <th class="wd-20p th-its" style="border-bottom: none !important"><span>Kehadiran</span></th>
                  <th class="wd-5p th-its" style="border-bottom: none !important"><span>Vaksinasi Ke</span></th>
                  <th class="wd-10p th-its" style="border-bottom: none !important"><span>Vaksinasi Pada</span></th>
                  <th class="wd-10p th-its" style="border-bottom: none !important"><span>Vaksinasi Selanjutnya</span></th>
                  <th class="wd-20p th-its" style="border-bottom: none !important"><span>Vaksinator</span></th>
                  <th class="wd-10p th-its" style="border-bottom: none !important"><span>Penyelenggara</span></th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($vaksin as $item)
                      <tr>
                        <td class="td-its align-middle border-bottom">
                            <a href="{{ route('laporan.show', $item->id) }}">
                              <p class="mg-b-0 tx-medium tx-color-its3">{{ $item->pegawai->users->name }}</p>
                              <p class="mg-b-0 tx-13 tx-color-03">{{ $item->pegawai->nik }}</p>
                            </a>
                          </td>
                          @if ($item->hadir == 0)
                          <td class="td-its align-middle border-bottom d-flex align-items-center">
                              <form action="{{ route('laporan.hadir', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-white btn-icon" type="submit" data-toggle="tooltip" data-placement="bottom" title="Hadir"><i class="fas fa-check-circle tx-success"></i></button>
                              </form>
                              <form action="{{ route('laporan.tidak-hadir', $item->id) }}" class="mg-l-5" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-white btn-icon" type="submit" data-toggle="tooltip" data-placement="bottom" title="Tidak hadir"><i class="fas fa-times-circle tx-danger"></i></button>
                              </form>
                            @elseif ($item->hadir == 1)
                            <td class="td-its align-middle border-bottom align-items-center">
                                <span class="tx-color-01"><i class="fas fa-check-circle mg-r-5 tx-success"></i>Hadir</span>
                            @else
                            <td class="td-its align-middle border-bottom align-items-center">
                                <span class="tx-color-01"><i class="fas fa-times-circle mg-r-5 tx-danger"></i>Tidak hadir</span>
                            @endif
                          </td>
                          <td class="td-its align-middle border-bottom tx-color-02">{{ $item->vaksin_ke }}</td>
                          <td class="td-its align-middle border-bottom tx-color-02">{{ date('d/m/Y', strtotime($item->tanggal_vaksin)) }}</td>
                          <td class="td-its align-middle border-bottom tx-color-02">{{ $item->tanggal_kembali ? date('d/m/Y', strtotime($item->tanggal_kembali)) : '-' }}</td>
                          <td class="td-its align-middle border-bottom tx-color-02">{{ $item->jadwal->vaksinator->nama }}</td>
                          <td class="td-its align-middle border-bottom tx-color-02">{{ $item->jadwal->penyelenggara }}</td>        
                      </tr>
                  @endforeach
              </tbody>
            </table>
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