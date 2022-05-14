<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title ?? config('app.name') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">

  
  <link rel="shortcut icon" href="<?php echo url('') ?>/buku/logokotabogor.png">
</head>

<body>
 <div class="navbar-bg "></div>
      @include('layouts.headerhome')
    
        <div  style=" display: block;
        margin-left: 50%;
        margin-right: 50%;
        margin-top: 147px;
        margin-bottom: 50px;
        align-item: center; ">
            <img alt="Logo Pemkot" src="/buku/logokotabogor.gif" width="80" height="100">
        </div> 
    </div>
     
      <!-- Main Content -->
   
      <div class="main-content">
                 
          @yield('content')
      </div>
        <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div>Pemerintah Kota Bogor</a>
          <br/><a href="https://www.freepik.com/vectors/business"><span style="color:red">Business vector created by macrovector - www.freepik.com</span></a>
            <br/><a href="https://www.freepik.com/vectors/background"><span style="color:red">Background vector created by GraphiqaStock - www.freepik.com</span></a>
            <br/><a href="https://www.freepik.com/vectors/technology"><span style="color:red">Technology vector created by gstudioimagen - www.freepik.com</span></a>
            <br/><a href="https://www.freepik.com/vectors/business"><span style="color:red">Business vector created by rawpixel.com - www.freepik.com</span></a>
            <br/><a href="https://www.freepik.com/vectors/logo"><span style="color:red">Logo vector created by freepik - www.freepik.com</span></a>
 
          
        </div>
        <div class="footer-right">
          0.0.1
        </div>
      </footer>
    </div>
  </div>
  @stack('before-scripts')
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->

</body>
</html>
