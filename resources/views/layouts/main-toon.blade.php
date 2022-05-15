<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>

  

  <title>
    @if (isset($title))
    DHC | {{ $title }}
    @else
    Del Health Care
    @endif
  </title>

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    
    .notification {
      /* background-color: #555; */
      color: white;
      text-decoration: none;
      padding: 15px 26px;
      position: relative;
      /* display: inline-block; */
      border-radius: 2px;
    }
    
    
    .notification .badge {
      position: absolute;
      top: 1px;
      right: 1px;
      padding: 5px 10px;
      border-radius: 50%;
      background-color: #07be94;
      color: white;
    }
    </style>
  
  <link rel="shortcut icon" href="/img/del.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="/css/trix.css">

    <!-- Meta tag Keywords -->
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
        
        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }

    </script>

    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="/css/bootstrap-toon.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="/css/style-toon.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="/css/font-awesome-toon.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900" rel="stylesheet">
    <!-- //Fonts -->

    <link rel="stylesheet" type="text/css" href="/css/trix.css">

  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
       display: none;
    }
  </style>

</head>

<body>

  
    <!-- mian-content -->
    <section class="main-content" id="home">

        <!-- header -->
        <header>
            <div class="container-fluid px-lg-5">
              <!-- nav -->
              @include('partials.navbar-toon')
              <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
      
      </section>

      @yield('container')
    
    <!--/footer-->
    <footer class="footer mt-5">
        <div class="container-fluid p-lg-5 p-md-3">

            <div class="row py-sm-4 py-3">

                <div class="col-lg-4 footer-end-grid">
                    <h2>
                        <a href="index.html" style="background-color: transparent; color:#ffffff">Del <span style="background-color: transparent; color:#ffffff">Health Care</span></a>
                    </h2>
                    <p class="my-4 text-justify">Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem, ac scelerisque nisl nibh vel lacus. Proin eget gravida odio.</p>
                    <h3 style="color: white">Follow Us</h3>
                    <div class="text-center d-flex">
                        <a href="https://www.facebook.com/Institut.Teknologi.Del" class="badge mr-2" style="background: linear-gradient(#000046, #1cb5e0);" target="_blank">
                          Facebook
                        </a>

                        <a href="https://www.instagram.com/it.del/" class="badge mr-2" style="background: linear-gradient(#B228B8, #F8914D)" target="_blank">
                          Instagram
                        </a>

                        <a href="https://www.linkedin.com/school/institut-teknologi-del/" class="badge mr-2 text-dark" style="background: linear-gradient(#0A66C2, #FFFFFF)" target="_blank">
                          LinkedIn
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4">
                  <h3 class="text-white">Useful Link</h3>
                  <ul class="list-footer-w3layouts">
                      <li>
                          <a href="/" class="nav-link">
                              Beranda
                          </a>
                      </li>
                      @can('home-mahasiswa')
                      <li class="my-2">
                          <a href="/mahasiswa/konsultasi" class="nav-link">
                             Konsultasi
                          </a>
                      </li>
                      <li class="my-2">
                          <a href="/mahasiswa/rekmeds" class="nav-link">
                             Rekam Medis
                          </a>
                      </li>
                      <li class="my-2">
                          <a href="/mahasiswa/riwayatpenyakits" class="nav-link">
                             Riwayat Penyakit
                          </a>
                      </li>
                      @endcan

                      @can('home-dokter')
                      <li class="my-2">
                          <a href="/dokter/konsultasi" class="nav-link">
                             Konsultasi
                          </a>
                      </li>
                      <li class="my-2">
                          <a href="/dokter/rekammedis" class="nav-link">
                             Rekam Medis
                          </a>
                      </li>
                      <li class="my-2">
                          <a href="/dokter/riwayatpenyakits" class="nav-link">
                             Riwayat Penyakit
                          </a>
                      </li>
                      @endcan

                      @can('home-pengurus')
                      
                      <li class="my-2">
                          <a href="/pengurus/rekmeds" class="nav-link">
                             Rekam Medis
                          </a>
                      </li>
                      <li class="my-2">
                          <a href="/pengurus/riwayatpenyakits" class="nav-link">
                             Riwayat Penyakit
                          </a>
                      </li>
                      @endcan

                  </ul>
              </div>

              <div class="col-lg-2  mt-sm-5">
                <ul class="list-footer-w3layouts">
                    @guest
                    <li>
                      <a href="/login" class="nav-link">
                        Login
                      </a>
                    </li>
                    @endguest
                    @auth
                    @if(auth()->user()->can('home-dokter') || auth()->user()->can('home-pengurus') || auth()->user()->can('home-mahasiswa'))
                    <li>
                      <a href="/{{ auth()->user()->role }}/profile" class="nav-link">
                        Profile
                      </a>
                    </li>
                    @endif
                    <li>
                      <form action="/logout" method="post">
                        @csrf
                        <button class="nav-link text text-decoration-none text-white" style="background-color: transparent;border:0">
                            Log Out
                        </button>
                      </form>
                    </li>
                    @endauth
                </ul>
            </div>
                
            </div>
            <hr>
        </div>
    </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/trix.js"></script>
<script src="/js/jquery-3.5.1.min.js"></script>

<script src="/js/bootstrap.bundle.min.js"></script>

<script src="/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="/vendor/wow/wow.min.js"></script>

<script src="/js/theme.js"></script>

<script type="text/javascript" src="/js/trix.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

</html>