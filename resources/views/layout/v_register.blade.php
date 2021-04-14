<!DOCTYPE html>
<html lang="en">

<head>
    <title>P3M - Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="shortcut icon" href="{{ asset('template') }}/dist/img/p3mlogosquare.svg" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lgn') }}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('lgn') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lgn') }}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lgn') }}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lgn') }}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/tweaks.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('lgn') }}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('lgn') }}/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" style="padding:50px; width:500px;justify-content: center;">
                {{-- <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('template') }}/dist/img/p3mlogo-ori-hd-remake.png" alt="IMG">
                </div> --}}

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title">
                        Silahkan Mendaftarkan Diri Anda
                    </span>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="NIK is required">
                            <input class="input100 @error('nik') is-invalid @enderror" type="text" name="nik"
                                value="{{ old('nik') }}" placeholder="NIK" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('nik')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="">
                            <input class="input100 @error('name') is-invalid @enderror" type="text" name="name"
                                value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name"
                                placeholder="Nama Lengkap">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="">
                            <input class="input100 @error('alamat') is-invalid @enderror" type="text" name="alamat"
                                value="{{ old('alamat') }}" placeholder="Alamat" required autocomplete="alamat"
                                placeholder="Alamat">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('alamat')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="">
                            <input class="input100 @error('kota') is-invalid @enderror" type="text" name="kota"
                                value="{{ old('kota') }}" placeholder="Kota" required autocomplete="kota"
                                placeholder="kota">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('kota')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="">
                            <input class="input100 @error('Kecamatan') is-invalid @enderror" type="text"
                                name="kecamatan" value="{{ old('kecamatan') }}" placeholder="Kecamatan" required
                                autocomplete="kecamatan">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-map-pin" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('kecamatan')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="">
                            <input class="input100 @error('desa') is-invalid @enderror" type="text" name="desa"
                                value="{{ old('desa') }}" placeholder="Desa" required autocomplete="desa"
                                placeholder="desa">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-map" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('desa')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100 @error('email') is-invalid @enderror" type="text" name="email"
                                value="{{ old('email') }}" required autocomplete="Email" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="">
                            <input class="input100 @error('jk') is-invalid @enderror" type="text" name="jk"
                                value="{{ old('jk') }}" placeholder="Jenis Kelamin" required autocomplete="jk">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-venus-mars" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('jk')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="">
                            <input class="input100 @error('telepon') is-invalid @enderror" type="text" name="telepon"
                                value="{{ old('telepon') }}" placeholder="Telepon" required autocomplete="telepon">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('telepon')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="">
                            <input class="input100 @error('pekerjaan') is-invalid @enderror" type="text"
                                name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Pekerjaan" required
                                autocomplete="pekerjaan">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('pekerjaan')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100 @error('password') is-invalid @enderror" type="password"
                                name="password" placeholder="Password" required autocomplete="new-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password_confirmation"
                                placeholder="Confirm Password" required autocomplete="new-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="text-center mt-5">
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
    <script src="{{ asset('lgn') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('lgn') }}/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ asset('lgn') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('lgn') }}/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('lgn') }}/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })

    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('lgn') }}/js/main.js"></script>

</body>

</html>
