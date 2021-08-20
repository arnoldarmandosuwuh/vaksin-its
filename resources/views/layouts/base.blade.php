<!DOCTYPE html>
<html lang="en">
  <head>
   @include('partials.head')
   @method('head')
  </head>
  <body>

    @if (Auth::user()->hasRole('Admin'))
      @include('partials.admin.sidebar')
    @else
      @include('partials.pegawai.sidebar')
    @endif

    @yield('content')

    <div class="modal fade effect-scale" id="photoprofil" tabindex="-1" role="dialog" aria-labelledby="photoprofil" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content tx-14 bg-white pd-10">
          <img src="https://i-invdn-com.akamaized.net/content/pic583d7c53b21af8b691aac70a6994c4c9.jpg" class="rounded-its2 wd-100p mg-b-10" alt="">
          <a href="https://my.its.ac.id/sso/account" class="btn btn-white tx-montserrat tx-semibold" target="_blank"><i data-feather="edit" class="wd-10 mg-r-5"></i> Sunting</a>
        </div>
      </div>
    </div>
    
    @include('partials.script')
    @yield('js')

  </body>
</html>
