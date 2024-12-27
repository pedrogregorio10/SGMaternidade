<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin &mdash; @yield('title')</title>
  <!--TESTE DE CSS-->
  @stack('style')
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
  <!-- DATATABLE CSS-->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
  <!-- ICon CSS-->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.min.css') }}">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>

<body style="background-color: #f1f1f1">
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                toastr()->error($error)
                @endphp

            @endforeach
        @endif
      <div class="navbar-bg"></div>

      <!--START NAV BAR Joel Guerra-->
        @include('admin.layout.navbar')
      <!--END NAV BAR-->

      <!--START SIDE-BAR Joel Guerra-->
        @include('admin.layout.sidebar')
      <!--END SIDE-BAR-->

      <!-- START MAIN CONTENT Joel Guerra-->
      @yield('content')
      <!--END MAIN CONTENT-->

      <!--START FOOTER Joel Guerra-->
      <footer class="main-footer">
        <div class="footer-left">
          Todos direitos reservados &copy; <?=date('Y')?> <div class="bullet"></div> Design By <a target="_blank" href="#">Joel Guerra</a> Versão 1.0
        </div>
        <div class="footer-right">

        </div>
      </footer>
      <!-- END FOOTER-->

    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('admin/assets/modules/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/chart.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <script src="{{ asset('admin/assets/modules/prism/prism.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('admin/assets/js/page/index.js') }}"></script>
  <script src="{{ asset('admin/assets/js/page/bootstrap-modal.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

  <!--DATATABLE JS-->
  <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>

  <!--ICOn JS-->
  <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>

  <!-- SweetAlert modal -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!--Modal Delete-->
<script>
    $(document).ready(function(){
        $('body').on('click','.delete-item',function(event){
            event.preventDefault();
            let deleteUrl = $(this).attr('href');
            Swal.fire({
            title: "Tem certeza que deseja remover?",
            text: "Essa acção não poderá ser revertida!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, elimine!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        _token:"{{ csrf_token() }}",
                    },

                    success: function (response) {
                        Swal.fire({
                        title: "Removido!",
                        text: response.success,
                        icon: "success",
                        showConfirmButton:false
                        });
                        window.location.reload();
                    }

                });
            }

            });
        })
    })
</script>
 @stack('scripts')
</body>
</html>
