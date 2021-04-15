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

                <form class="validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title">
                        Silahkan Buat Akun Anda
                    </span>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="NIK tidak boleh kosong">
                            <input class="input100 @error('nik') is-invalid @enderror" type="text" name="nik"
                                value="{{ old('nik') }}" placeholder="NIK">
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
                        <div class="wrap-input100 validate-input" data-validate="Nama tidak boleh kosong">
                            <input class="input100 @error('name') is-invalid @enderror" type="text" name="name"
                                value="{{ old('name') }}" placeholder="Full Name" autocomplete="name"
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
                        <div class="wrap-input100 validate-input" data-validate="Alamat tidak boleh kosong">
                            <input class="input100 @error('alamat') is-invalid @enderror" type="text" name="alamat"
                                value="{{ old('alamat') }}" placeholder="Alamat" autocomplete="alamat"
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
                        <div class="wrap-input100 validate-input" data-validate="Kota tidak boleh kosong">
                            <input class="input100 @error('kota') is-invalid @enderror" type="text" name="kota"
                                value="{{ old('kota') }}" placeholder="Kota" autocomplete="kota" placeholder="kota">
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
                        <div class="wrap-input100 validate-input" data-validate="Kecamatan tidak boleh kosong">
                            <input class="input100 @error('Kecamatan') is-invalid @enderror" type="text"
                                name="kecamatan" value="{{ old('kecamatan') }}" placeholder="Kecamatan"
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
                        <div class="wrap-input100 validate-input" data-validate="Desa tidak boleh kosong">
                            <input class="input100 @error('desa') is-invalid @enderror" type="text" name="desa"
                                value="{{ old('desa') }}" placeholder="Desa" autocomplete="desa" placeholder="desa">
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
                                value="{{ old('email') }}" autocomplete="Email" placeholder="Email">
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
                        <div class="wrap-input100">
                            <div class="col-sm-12 radio-styled text-center mt-4">
                                <label>
                                    <input type="radio" class="minimal" name="jk" checked>
                                    <i class="fa fa-male" aria-hidden="true" value="Laki-Laki"></i> Laki-Laki
                                </label>
                                <label>
                                    <input type="radio" class="minimal" name="jk">
                                    <i class="fa fa-female" aria-hidden="true" value="Perempuan"></i> Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="Telepon tidak boleh kosong">
                            <input class="input100 @error('telepon') is-invalid @enderror" type="text" name="telepon"
                                value="{{ old('telepon') }}" placeholder="Telepon" autocomplete="telepon">
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
                        <div class="wrap-input100 validate-input" data-validate="Pekerjaan tidak boleh kosong">
                            <input class="input100 @error('pekerjaan') is-invalid @enderror" type="text"
                                name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Pekerjaan"
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
                        <div class="wrap-input100 validate-input" data-validate="Password tidak boleh kosong">
                            <input class="input100 @error('password') is-invalid @enderror" type="password"
                                name="password" placeholder="Password" autocomplete="new-password">
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
                        <div class="wrap-input100 validate-input" data-validate="Password tidak boleh kosong">
                            <input class="input100" type="password" name="password_confirmation"
                                placeholder="Confirm Password" autocomplete="new-password">
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
