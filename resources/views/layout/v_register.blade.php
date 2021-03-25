<!DOCTYPE html>
<html lang="en">
<head>
	<title>P3M - Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" href="{{asset('template')}}/dist/img/p3mlogosquare.svg" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lgn')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lgn')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lgn')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('lgn')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('lgn')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/tweaks.css">
	<link rel="stylesheet" type="text/css" href="{{asset('lgn')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('lgn')}}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('template')}}/dist/img/p3mlogo.svg" alt="IMG">
				</div>

				<form method="POST" action="{{ route('login') }}">
                    @csrf
					<span class="login100-form-title">
						Silahkan Mendaftarkan Diri Anda
					</span>

					<div class="wrap-input100 validate-input" data-validate = "NIK is required">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="nik" placeholder="NIK" required >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "">
						<input class="input100 @error('email') is-invalid @enderror" type="text"  name="name" placeholder="Full Name" required autocomplete="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 @error('email') is-invalid @enderror" type="text"  name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="pass" placeholder="Password" required autocomplete="current-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Register
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{ '/login' }}">
							Sudah Punya Akun
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{asset('lgn')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('lgn')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('lgn')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('lgn')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('lgn')}}/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('lgn')}}/js/main.js"></script>

</body>
</html>