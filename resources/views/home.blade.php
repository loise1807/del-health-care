@extends('layouts.main-toon')

@section('container') 

<div class="csslider infinity" id="slider1">
  <input type="radio" name="slides" checked="checked" id="slides_1" />
  <input type="radio" name="slides" id="slides_2" />
  <input type="radio" name="slides" id="slides_3" />
  <input type="radio" name="slides" id="slides_4" />
  <ul>
      <li>
          <div id="bg">
              <div class="banner-text-wthree">
                  <div class="container">
                      <h3 >Sehat Bersama Kami</h3>
                  </div>
              </div>
          </div>
      </li>
      <li>
          <div id="bg1">
              <div class="banner-text-wthree">
                  <div class="container">
                      <h3>Konsultasi dengan Dokter Pilihan</h3>
                  </div>
              </div>
          </div>
      </li>
      <li>
          <div id="bg2">
              <div class="banner-text-wthree">
                  <div class="container">
                      <h3>Pemantauan Rekam Medis yang Mudah</h3>
                  </div>
              </div>
          </div>
      </li>
      <li>
          <div id="bg3">
              <div class="banner-text-wthree">
                  <div class="container">
                      <h3>Perhatikan Kesehatan dari Hal Kecil</h3>
                  </div>
              </div>
          </div>
      </li>

  </ul>
  <div class="arrows">
      <label for="slides_1"></label>
      <label for="slides_2"></label>
      <label for="slides_3"></label>
      <label for="slides_4"></label>
  </div>
  <div class="navigation">
      <div>
          <label for="slides_1"></label>
          <label for="slides_2"></label>
          <label for="slides_3"></label>
          <label for="slides_4"></label>
      </div>
  </div>
</div>

<section class="about py-lg-5 py-md-5 py-3">
  <div class="container">
      
      <div class="inner-sec-w3layouts py-lg-5 py-3">
          <div class="row">
              <div class="col-lg-6 about-right px-lg-5 px-2 mt-lg-5 mt-2">

                  <h3 class="tittle"><span class="sub-tittle">Tentang</span>Del Health Care</h3>
                  <p class="my-4 text-justify">Lorem ipsum dolor sit amet Neque porro quisquam est qui dolorem Lorem int ipsum dolor sit amet when an unknown printer took a galley of type.Vivamus id tempor felis. Cras sagittis mi sit amet malesuada mollis. Mauris porroinit consectetur cursus tortor vel interdum.</p>

                  {{-- <a href="single.html" class="read my-3 btn"><span class="fa fa-long-arrow-alt-right"></span> Read More</a> --}}
                  {{-- <h6 class="my-3">Follows On:</h6>
                  <ul >
                      <li>
                          <a href="#">
                         Facebook
                      </a>
                      </li>
                      <li>
                          <a href="#">
                          Twitter
                      </a>
                      </li>
                      <li>
                          <a href="#">
                        Google +
                      </a>
                      </li>

                  </ul> --}}

              </div>
              <div class="col-lg-6 about-img">
                  <img src="/img/doctors/doctor_1.jpg" class="img-fluid" alt="user-image">
              </div>
          </div>
      </div>

      <section class="services-top bg-light py-5">
        <div class="container">
            <div class="inner-sec-w3layouts py-lg-5 py-3">
                <h3 class="tittle text-center"><span class="sub-tittle">Fitur</span>Pelayanan</h3>
                <!-- services top row -->
                <div class="row pt-md-5">
                    <div class="col-md-6 services-gd-img">
                        <img src="/img/doctors/doctor_2.jpg" class="img-fluid" alt="user-image">
                    </div>
                    <div class="col-md-6 services-gd-info">
                        <div class="my-3 services-gd">
                            <div class="card-body">
                                <span class="fa fa-bell-o" aria-hidden="true"></span>
                                <h5 class="card-title">Permintaan Konsultasi</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="services-gd my-2">
                            <div class="card-body">
                                <span class="fa fa-binoculars" aria-hidden="true"></span>
                                <h5 class="card-title">Catatan Rekam Medis</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="my-3 services-gd">
                            <div class="card-body">
                                <span class="fa fa-flask" aria-hidden="true"></span>
                                <h5 class="card-title">Pemantauan Riwayat Penyakit</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

  </div>
</section>


@endsection