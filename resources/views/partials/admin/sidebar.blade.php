<aside class="aside aside-fixed">
    <div class="aside-header">
  <a href="{{ route('dashboard') }}" class="tx-montserrat tx-semibold tx-18 aside-logo">myITS Vaksin</a>
  <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
  </a>
</div>
<div class="aside-body">
  <ul class="nav nav-aside">
      <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="home"></i> <span>Beranda</span></a></li>
      <li class="nav-label mg-t-15">Kelola</li>
      <li class="nav-item"><a href="{{ route('jadwal-vaksinasi.index') }}" class="nav-link"><i data-feather="calendar"></i> <span>Jadwal Vaksinasi</span></a></li>
      <li class="nav-item"><a href="{{ route('laporan.index') }}" class="nav-link"><i data-feather="clipboard"></i> <span>Laporan</span></a></li>
      <li class="nav-label mg-t-15">Data</li>
      <li class="nav-item"><a href="{{ route('pegawai.index') }}" class="nav-link"><i data-feather="user"></i> <span>Pegawai</span></a></li>
      <li class="nav-item"><a href="{{ route('vaksinator.index') }}" class="nav-link"><i data-feather="users"></i> <span>Vaksinator</span></a></li>
      <li class="nav-item"><a href="{{ route('jenis-vaksin.index') }}" class="nav-link"><i data-feather="copy"></i> <span>Jenis Vaksin</span></a></li>
  </ul>
</div>
</aside>