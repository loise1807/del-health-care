<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>
    @if (isset($title))
        DHC | {{ $title }}
    @else
        Del Health Care
    @endif
  </title>

  <link rel="shortcut icon" href="/img/del.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Boostrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="/css/maicons.css">

  <link rel="stylesheet" type="text/css" href="/css/trix.css">

  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
       display: none;
    }
  </style>


  <link rel="stylesheet" href="/css/bootstrap.css">

  <link rel="stylesheet" href="/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="/vendor/animate/animate.css">

  <link rel="stylesheet" href="/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('partials.navbar')

  <div>
    @yield('container')
  </div>

<script src="/js/jquery-3.5.1.min.js"></script>

<script src="/js/bootstrap.bundle.min.js"></script>

<script src="/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="/vendor/wow/wow.min.js"></script>

<script src="/js/theme.js"></script>

<script type="text/javascript" src="/js/trix.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  
</body>
</html>