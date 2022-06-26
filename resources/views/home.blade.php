@extends('layouts.main-toon')

@section('container') 

<style>
    #more {display: none;}
    </style>

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
                  <p class="my-4 text-justify">Sistem Informasi yang sesuai dan dapat membantu proses pemantauan kesehatan mahasiswa nya adalah Sistem informasi Del Health Care, dimana sistem ini adalah sistem informasi yang akan dikembangkan guna membantu dan memantau kesehatan mahasiswa IT Del khususnya di tengah masa pandemi saat ini. Pemantauan kesehatan mahasiswa/i merupakan hal yang penting, pernyataan ni disetujui oleh 99.7% dari responden kuesioner terhadap mahasiswa IT Del. Cara yang digunakan pihak kampus IT Del ini berupa link yang dimana akan membawa ke sebuah halaman berisikan pertanyaan-pertanyaan pemantauan kesehatan fisik mahasiswa/i <span id="dots">...</span><span id="more">yang dikirimkan oleh keasramaan kepada mahasiswa/i dan nantinya data berupa jawaban dari pertanyaan-pertanyaan tersebut di dapat di simpan ke dalam bentuk excel. berdasarkan penyebaran kuesioner terhadap mahasiswa IT Del 92.8% mengatakan bahwa cara yang digunakan untuk pemantauan tidak efisien, karena akhir dari pengumpulan data tiap form nya hanya sampai pada format file excel. Google form yang digunakan tidak mampu menyimpan data medis ataupun data pemantauan kesehatan mahasiswa/i dalam sebuah database yang dimana ini sangat dibutuhkan jika terjadi perubahan perilaku yang tidak normal dari seorang mahasiswa/i yang dapat mempengaruhi atau berdampak bagi perkuliahan. Berdasarkan pengamatan terhadap sistem yang berjalan saat ini dan dihubungkan dengan respon dari hasil kuesioner terhadap mahasiswa, kami menarik kesimpulan bahwa pihak kampus membutuhkan sebuah sistem yang mampu merekapitulasi data rekam medis maupun data hasil pemantauan kesehatan yang telah dilakukan, maka pihak keasramaan dapat memantau hasil rekaman data pemantauan kesehatan mahasiswa/i yang mengalami perubahan perilaku maupun hal lainnya yang dapat mempengaruhi dan berdampak bagi perkuliahan mahasiswa/i. </span></p>
                  <button onclick="myFunction()" id="myBtn">Read more</button>

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
                                <p class="card-text">Fitur yang bergunaan untuk melakukan permintaan konsultasi dengan dokter dokter pilihan untuk Mahasiswa.</p>
                            </div>
                        </div>
                        <div class="services-gd my-2">
                            <div class="card-body">
                                <span class="fa fa-binoculars" aria-hidden="true"></span>
                                <h5 class="card-title">Catatan Rekam Medis</h5>
                                <p class="card-text">Fitur yang memperlihatkan Rekam Medis mahasiswa yang dilakukan dokter kepada Mahasiswa agar bisa dipantau kesehatannya secara rutin.</p>
                            </div>
                        </div>
                        <div class="my-3 services-gd">
                            <div class="card-body">
                                <span class="fa fa-flask" aria-hidden="true"></span>
                                <h5 class="card-title">Pemantauan Riwayat Penyakit</h5>
                                <p class="card-text">Fitur yang memperlihatkan Riwayat Penyakit mahasiswa agar dapat dilakukan pemantauan kesehatan agar mahasiswa merasa nyaman saat berada di Kampus.</p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

  </div>
</section>

<script>
    function myFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");
    
      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less"; 
        moreText.style.display = "inline";
      }
    }
    </script>

@endsection