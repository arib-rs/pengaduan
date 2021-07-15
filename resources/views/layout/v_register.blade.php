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
            <div class="wrap-login100" style="padding:50px; width:700px;justify-content: center;">
                {{-- <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('template') }}/dist/img/p3mlogo-ori-hd-remake.png" alt="IMG">
                </div> --}}

                <form class="validate-form" style="width:100%" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title">
                        Silahkan Buat Akun Anda
                    </span>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">NIK</label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="NIK tidak boleh kosong">
                            <input class="input100 @error('nik') is-invalid @enderror" type="text" name="nik"
                                value="{{ old('nik') }}" placeholder="16 digit NIK sesuai KTP"
                                onkeypress="return onlyNumber(event)">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('nik')
                            <span class="invalid-feedback d-block  col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Nama</label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="Nama tidak boleh kosong">
                            <input class="input100 @error('name') is-invalid @enderror" type="text" name="name"
                                value="{{ old('name') }}" placeholder="Nama lengkap sesuai KTP" autocomplete="name"
                                placeholder="Nama Lengkap">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('name')
                            <span class="invalid-feedback d-block col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Alamat</label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="Alamat tidak boleh kosong">
                            <input class="input100 @error('alamat') is-invalid @enderror" type="text" name="alamat"
                                value="{{ old('alamat') }}" placeholder="Contoh: Jl Diponegoro no. 9 RT 08 RW 08"
                                autocomplete="alamat" placeholder="Alamat">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('alamat')
                            <span class="invalid-feedback d-block col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Kota / Kabupaten</label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="Kota tidak boleh kosong">
                            <input class="input100 @error('kota') is-invalid @enderror" type="text" name="kota"
                                value="{{ old('kota') }}" placeholder="Contoh: Sidoarjo" autocomplete="kota"
                                placeholder="kota">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('kota')
                            <span class="invalid-feedback d-block col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Kecamatan</label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="Kecamatan tidak boleh kosong">
                            <input class="input100 @error('Kecamatan') is-invalid @enderror" type="text"
                                name="kecamatan" value="{{ old('kecamatan') }}" placeholder="Contoh: Sukodono"
                                autocomplete="kecamatan">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-map-pin" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('kecamatan')
                            <span class="invalid-feedback d-block col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Desa</label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="Desa tidak boleh kosong">
                            <input class="input100 @error('desa') is-invalid @enderror" type="text" name="desa"
                                value="{{ old('desa') }}" placeholder="Contoh: Anggaswangi" autocomplete="desa"
                                placeholder="desa">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-map" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('desa')
                            <span class="invalid-feedback d-block col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Email</label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="Email harus valid. Contoh: ex@abc.xyz">
                            <input class="input100 @error('email') is-invalid @enderror" type="text" name="email"
                                value="{{ old('email') }}" autocomplete="Email"
                                placeholder="Contoh: ujangbensin@gmail.com">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('email')
                            <span class="invalid-feedback d-block col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Jenis Kelamin</label>
                        <div class="wrap-input100 col-lg-9 " style="display: inline-block; padding:0">
                            <div class="radio-styled text-center">
                                <label>
                                    <input type="radio" class="minimal" name="gender" value="Pria" checked>
                                    <i class="fa fa-male"></i> Pria
                                </label>
                                <label>
                                    <input type="radio" class="minimal" name="gender" value="Wanita">
                                    <i class="fa fa-female"></i> Wanita
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Telepon</label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="Telepon tidak boleh kosong">
                            <input class="input100 @error('telepon') is-invalid @enderror" type="text" name="telepon"
                                value="{{ old('telepon') }}" placeholder="Nomor telepon aktif" autocomplete="telepon"
                                onkeypress="return onlyNumber(event)">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                            </span>
                        </div>

                        @error('telepon')
                            <span class="invalid-feedback d-block col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Pekerjaan</label>
                        <div class="wrap-input100 col-lg-9" style="display: inline-block; padding:0">
                            <select class="input100" id="pekerjaan" name="pekerjaan">
                                <option value="" style="color:#999999">Pilih Pekerjaan</option>
                                @foreach ($pekerjaan as $d)
                                    <option value="{{ $d->id }}">{{ $d->pekerjaan }}</option>
                                @endforeach
                            </select>
                            <span class="symbol-input100">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('pekerjaan')
                            <span class="invalid-feedback d-block col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px">Password</label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="Password tidak boleh kosong">
                            <input class="input100 @error('password') is-invalid @enderror" type="password"
                                name="password" placeholder="Minimal 8 karakter" autocomplete="new-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2" style="margin-right:20px"></label>
                        <div class="wrap-input100 validate-input col-lg-9" style="display: inline-block; padding:0"
                            data-validate="Password tidak boleh kosong">
                            <input class="input100" type="password" name="password_confirmation"
                                placeholder="Masukkan ulang password" autocomplete="new-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback d-block col-lg-12" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="text-center mt-5">
                        <a class="txt2" href="{{ url('/login') }}">
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
    <script>
        function onlyNumber(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

    </script>
</body>

</html>
