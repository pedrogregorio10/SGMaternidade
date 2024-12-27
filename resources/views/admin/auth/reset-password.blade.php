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

            <div class="card card-primary">
              <div class="card-header"><h4>Recuperar senha</h4></div>
                @if (session('status'))
                    <p class="alert-warning">
                        Foi enviado um link no seu email para recoperção da senha!
                        {{ session('status') }}
                    </p>
                @endif

              <div class="card-body">
                <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-group">

                    <input id="email" type="email" class="form-control" name="email" tabindex="1" value="{{ old('email',$request->email) }}" required autofocus placeholder="Seu Email" >
                    @if ($errors->get('email'))
                        <code>{{ $errors->first('email') }}</code>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group">
                    <input id="password" type="password" class="form-control" name="password" tabindex="1" required autofocus placeholder="Nova senha" >
                    @if ($errors->get('password'))
                        <code>{{ $errors->first('password') }}</code>
                    @endif
                </div>
                <!-- Confirm Password -->

                <div class="form-group">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="1" required placeholder="Confirmea a senha" autocomplete="new-password">
                    @if ($errors->get('password_confirmation'))
                        <code>{{ $errors->first('password_confirmation') }}</code>
                    @endif
                </div>

                <!-- Confimar mudar senha-->
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Confirmar
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
                Criado por <a target="_blank" href="#">Joel Guerra</a>
            </div>
            <div class="simple-footer">
              Todos direitos reservados &copy; <?=date('Y')?>
              <br><a target="_blank" href="#">Joel Guerra</a>
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
