
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - AdminLTE Style</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
    <!-- AdminLTE (from CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.1/dist/css/adminlte.min.css" crossorigin="anonymous">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.6/styles/overlayscrollbars.min.css" crossorigin="anonymous">
    <style>
      /* small custom tweaks to match the screenshot and constrain width */
      body { background: #343a40; }
      .login-page { padding-top: 40px; }
      /* constrain the login box so it doesn't stretch full width */
      .login-box {
        width: 380px;
        margin: 6% auto;
      }
      /* card tweaks */
      .login-box .card { border-radius: 8px; overflow: hidden; }
      .card-header { background: #ffffff; }
      .card-header .h1 { margin: 0; font-weight: 700; }
      .login-card-body { background: rgba(0,0,0,0.05); color: #333; padding: 24px; }
      .login-box-msg { color: #495057; }
      .input-group-text { background: #fff; border-left: 0; }
      .form-control { border-right: 0; }
      .social-auth-links .btn { min-width: 220px; }
      @media (max-width: 420px) {
        .login-box { width: calc(100% - 32px); margin: 4% auto; }
      }
    </style>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="card card-outline card-dark">
        <div class="card-header text-center">
          <a href="#" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form method="POST" action="{{ route('login') }}">
            @csrf
            @if($errors->any())
              <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <div class="input-group mb-3">
              <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required autofocus>
              <div class="input-group-append input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>

            <div class="input-group mb-3">
              <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
              <div class="input-group-append input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>

            <div class="row">
              <div class="col-8">
                <div class="form-check">
                  <input type="checkbox" name="remember" id="remember" class="form-check-input">
                  <label class="form-check-label" for="remember">Remember Me</label>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
            </div>
          </form>

          <div class="social-auth-links text-center mt-3 mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary mb-2"><i class="fab fa-facebook me-2"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-danger"><i class="fab fa-google me-2"></i> Sign in using Google+</a>
          </div>

          <p class="mb-1">
            <a href="#">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
          </p>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.6/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.1/dist/js/adminlte.min.js" crossorigin="anonymous"></script>
  </body>
</html>
