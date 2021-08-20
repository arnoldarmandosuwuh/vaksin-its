<!DOCTYPE html>
<html lang="en">
  <head>
   @include('partials.head')
   @stack('head')
  </head>
  <body>
    
    @include('sweetalert::alert')

    @if (Auth::user()->hasRole('Admin'))
      @include('partials.admin.sidebar')
    @else
      @include('partials.pegawai.sidebar')
    @endif

    <div class="content ht-100v pd-0" style="position: relative">
      @include('partials.navbar')

      <div class="content-body ht-100p pd-t-80">
        <div class="container pd-x-0" id="content">
          @yield('content')
        </div><!-- container -->
      </div>
    </div>

    @yield('modal')
    
    @include('partials.script')
    @stack('js')

  </body>
</html>
