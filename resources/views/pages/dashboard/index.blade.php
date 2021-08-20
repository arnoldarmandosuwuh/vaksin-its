@extends('layouts.base')
@section('content')

<div class="content ht-100v pd-0" style="position: relative">
    @include('partials.navbar')

  <div class="content-body ht-100p pd-t-80">
    <div class="container pd-x-0" id="content">

      <div class="row row-xs">

        <div class="col-sm-12 col-lg-12 mg-b-30">
          <div class="row row-xs">
            <div class="col-sm-12 col-lg-12 mg-b-20 d-flex justify-content-center">
              <a href="#photoprofil" data-toggle="modal" data-animation="effect-scale" class="animated slideInUp">
                <div class="avatar avatar-xxl">
                  <img src="https://i-invdn-com.akamaized.net/content/pic583d7c53b21af8b691aac70a6994c4c9.jpg" class="rounded-circle shadow" alt="" data-toggle="tooltip" data-placement="bottom" title="Foto profil">
                </div>
              </a>
            </div>
            <div class="col-sm-12 col-lg-12 mg-b-10 text-center">
                <h3 class="mg-b-4 tx-montserrat tx-medium animated slideInUp text-capitalize">{{ Auth::user()->name }}</h3>
                <p class="mg-b-4 tx-color-03 tx-15 tx-medium animated slideInUp text-capitalize">{{ Auth::user()->roles->pluck('name')[0] }}</p>
            </div>
          </div>
        </div>

      </div><!-- row -->
    </div><!-- container -->
  </div>
</div>