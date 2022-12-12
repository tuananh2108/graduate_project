<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('/admin/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/admin/css/styles.css') }}">
</head>

<body>
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">Đăng nhập</div>
        @if (session('message'))
          <div class="alert alert-danger" role="alert">
            <strong>{{ session('message') }}</strong>
          </div>
        @endif

        <div class="panel-body">
          <form role="form" method="POST">
            @csrf
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" type="email" autofocus=""
                  value="{{ old('email') }}">

                @if ($errors->has('email'))
                  <div class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </div>
                @endif
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                @if ($errors->has('password'))
                  <div class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </div>
                @endif
              </div>
              <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me">Lưu đăng nhập
                </label>
              </div>
              <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
