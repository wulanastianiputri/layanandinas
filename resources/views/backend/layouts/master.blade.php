<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title ?? config('app.name') }}</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- sweetalert -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIl">
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo url('') ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo url('') ?>/assets/css/components.css">

  <link rel="shortcut icon" href="<?php echo url('') ?>/buku/logokotabogor.png">
</head>

<body>
  <script script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <scriptsrc="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </src=>
    <src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js">
      </src=>
      <div id="app">
        <div class="main-wrapper">
          <div class="navbar-bg" style="height:100px;"></div>
          @include('backend.layouts.header')
          @include('backend.layouts.sidebar')
          <!-- Main Content -->
          <div class="main-content">
            <div class="col-xs-12"></div>
            <section class="section">
              @yield('content')
            </section>

            @yield('modal')

        @yield('selesai')

        @yield('tolak')

        @yield('peninjauan')

          </div>
          <footer class="main-footer ">
            <div class="footer-left">
              Copyright &copy; 2021 <div class="bullet"></div>Pemerintah Kota Bogor</a>
            </div>
            <div class="footer-right">
              0.0.1
            </div>
          </footer>
        </div>
      </div>
      @stack('before-scripts')
      <!-- General JS Scripts -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script src="../assets/js/stisla.js"></script>
      <script>
        $(document).ready(function() {
          $('#tabel-data').DataTable();
          $('#data').deleteRow();
          $('#cancel').canceldeleteRow();
        });
      </script>
      <script>
          $(document).ready(function(){

            $("#val").validate(
            {
                ignore: [],
              debug: false,
                rules: { 

                    isi:{
                         required: function() 
                        {
                         CKEDITOR.instances.isi.updateElement();
                        },

                         minlength:100
                    }
                },
                messages:
                    {

                    isi:{
                        required:"Please enter Text",
                        minlength:"Please enter 100 characters"


                    }
                }
            });
        });
        </script>
      <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <!-- ckeditor -->
      <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
      <script>
        CKEDITOR.replace('isi');
      </script>
      @stack('page-scripts')
      <script src="<?php echo url('') ?>/assets/js/scripts.js"></script>
      <script src="<?php echo url('') ?>/assets/js/custom.js"></script>
      @yield('grafik')
      @stack('after-script')
</body>

</html>