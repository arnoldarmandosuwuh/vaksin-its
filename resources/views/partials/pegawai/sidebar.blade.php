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
      <li class="nav-label mg-t-15">Pegawai</li>
      <li class="nav-item"><a href="../pegawai/riwayat.html" class="nav-link"><i data-feather="clock"></i> <span>Riwayat</span></a></li>
      <li class="nav-item"><a href="{{ route('jadwal-vaksin.index') }}" class="nav-link"><i data-feather="calendar"></i> <span>Jadwal vaksinasi</span></a></li>
  </ul>
</div>
</aside>