<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login Admin</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <h1>Hospital Ngangula</h1>
            </div>

            <div class="card card-warning">
              <div class="card-header"><h4>Criar uma nova conta</h4></div>

              <div class="card-body">

                <form method="post" action="{{ route('register') }}" class="needs-validation">
                    @csrf

                    <input type="hidden" name="tipo" value="user">

                    <div class="form-group">
                        <!-- Nome -->
                        <label for="name">Nome Completo</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Seu Nome">
                        @if ($errors->has('name'))
                            <code>{{ $errors->first('name') }}</code>
                        @endif
                    </div>

                    <div class="form-group">
                        <!-- Email -->
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Seu Email">
                        @if ($errors->has('email'))
                            <code>{{ $errors->first('email') }}</code>
                        @endif
                    </div>

                    <div class="form-group">
                        <!-- Senha -->
                        <label for="password">Senha</label>
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Sua Senha">
                        @if ($errors->has('password'))
                            <code>{{ $errors->first('password') }}</code>
                        @endif
                    </div>

                    <div class="form-group">


                        <!-- Confirmação de Senha -->
                        <label for="password_confirmation">Confirme a Senha</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme sua Senha">
                        @if ($errors->has('password_confirmation'))
                            <code>{{ $errors->first('password_confirmation') }}</code>
                        @endif
                    </div>


                    <div class="form-group">
                        <!-- Botão de Submissão -->
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>


                </form>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
                Ja tem uma conta? <a href="{{ route('login') }}">Entre</a>
            </div>
            <div class="simple-footer">
              Todos direitos reservados &copy; <?=date('Y')?> <a target="_blank" href="#">Joel Guerra</a>
            </div>
          </div>
        </div>
      </div>
    </section>
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

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
</body>
</html>
