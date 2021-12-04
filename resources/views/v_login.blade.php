<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{asset('sb-admin-bootstrap5/loginbootstrap5/assetslogin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('sb-admin-bootstrap5/loginbootstrap5/assetslogin/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('sb-admin-bootstrap5/loginbootstrap5/assetslogin/css/style.css')}}" rel="stylesheet">

    <title>{{__('Login Page')}}</title>
  </head>
  <body>
    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                
                <div class="logo">
                  <img src="{{asset("sb-admin-bootstrap5/loginbootstrap5/assetslogin/images/user.png")}}">
                </div>
                <div class="form-group">
                  <input type="email" id="email" name="email" class="form-control _ge_de_ol @error('email') is-invalid @enderror"
                  value="{{old('email')}}" type="text" placeholder="Enter Email" 
                  required="" aria-required="true" autocomplete="email" autofocus>
                     @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control _ge_de_ol @error('password') is-invalid @enderror" placeholder="Enter Password" required=""
                  autocomplete="current-passwrod" aria-required="true">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                  {{-- <div class="_btn_04"> --}}
                    <button type="submit" class="btn btn-primary btn-lg btn-block">{{__('Login')}}</button>
                  {{-- </div> --}}
                    <a href="{{route('register')}}" class="btn btn-secondary btn-lg btn-block">{{__('Register')}}</a>
                </div>

                

                </form>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>