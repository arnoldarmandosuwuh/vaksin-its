@extends('layouts.base')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb breadcrumb-style2 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-montserrat tx-medium text-truncate">
        Pegawai
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
                <th class="wd-10p th-its" style="border-bottom: none !important"><span>Jenis Kelamin</span></th>
                <th class="wd-10p th-its" style="border-bottom: none !important"><span>Tgl Lahir</span></th>
                <th class="wd-20p th-its" style="border-bottom: none !important"><span>NIP/NPP</span></th>
                <th class="wd-10p th-its" style="border-bottom: none !important"><span>Golongan Darah</span></th>
                <th class="wd-15p th-its" style="border-bottom: none !important"><span>Nomor HP</span></th>
                <th class="wd-10p th-its" style="border-bottom: none !important"><span>Status</span></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $item)
                    <tr>
                      <td class="td-its align-middle border-bottom">
                        <a href="{{ route('pegawai.show', $item->id) }}">
                          <p class="mg-b-0 tx-medium tx-color-its3 text-capitalize">{{ $item->users->name }}</p>
                          <p class="mg-b-0 tx-13 tx-color-03">{{ $item->nik }}</p>
                        </a>
                      </td>
                      <td class="td-its align-middle border-bottom">{{ $item->jenis_kelamin }}</td>
                      <td class="td-its align-middle border-bottom">{{ date('d/m/Y', strtotime($item->tanggal_lahir)) }}</td>
                      <td class="td-its align-middle border-bottom">{{ $item->nip }}</td>
                      <td class="td-its align-middle border-bottom">{{ $item->golongan_darah }}</td>
                      <td class="td-its align-middle border-bottom">{{ $item->nomor_hp }}</td>
                      <td class="td-its align-middle border-bottom">{{ $item->status }}</td>
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