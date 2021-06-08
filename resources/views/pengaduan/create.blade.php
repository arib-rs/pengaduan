@extends('layout/main')

@section('title', $title)

@section('container')
    <div class="content-wrapper">
        {{-- <section class="content-header">
		<h1>Pengaduan</h1>
	</section> --}}

        <section class="content">
            <form id="form-data" class="form-horizontal" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="header-title">
                                <h2>{{ $title }}</h2>

                            </div>
                            <div id="data-pelapor">
                                <div class="header-title">
                                    <h2 style="font-size:16px !important">Data Pelapor</h2>
                                    <hr>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama"
                                                value="{{ $usertamu ? $usertamu['name'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="col-sm-2 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-10 radio-styled">
                                            <label>
                                                <input type="radio" class="minimal" value="Pria" name="gender"
                                                    {{ $usertamu && $usertamu['gender'] == 'Pria' ? 'checked' : '' }}>
                                                <i class="fa fa-male" aria-hidden="true"></i>
                                                <span style="font-weight:normal"> Pria</span>
                                            </label>
                                            <label>
                                                <input type="radio" class="minimal" value="Wanita" name="gender"
                                                    {{ $usertamu && $usertamu['gender'] == 'Wanita' ? 'checked' : '' }}>
                                                <i class="fa fa-female" aria-hidden="true"></i>
                                                <span style="font-weight:normal"> Wanita</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label for="alamat" class="col-sm-2 control-label">Jalan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                                        placeholder="Nama Jalan"
                                                        value="{{ $usertamu ? $usertamu['alamat'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="desa" class="col-sm-2 control-label">Desa</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="desa" name="desa"
                                                        placeholder="Desa"
                                                        value="{{ $usertamu ? $usertamu['desa'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                                        placeholder="Kecamatan"
                                                        value="{{ $usertamu ? $usertamu['kecamatan'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kota" class="col-sm-2 control-label">Kota</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="kota" name="kota"
                                                        placeholder="Kota"
                                                        value="{{ $usertamu ? $usertamu['kota'] : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Pekerjaan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="pekerjaan" name="pekerjaan" autocomplete="off"
                                                required>
                                                <option value="">-- Pilih Pekerjaan --</option>
                                                @foreach ($jobs as $d)
                                                    <option value="{{ $d->id }}"
                                                        {{ $usertamu && $usertamu['pekerjaan'] == $d->id ? 'selected' : '' }}>
                                                        {{ $d->pekerjaan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon" class="col-sm-2 control-label">Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="telepon" name="telepon"
                                                placeholder="Telepon" onkeypress="return onlyNumber(event)"
                                                value="{{ $usertamu ? $usertamu['telepon'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">E-mail</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="E-mail" value="{{ $usertamu ? $usertamu['email'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sosmed" class="col-sm-2 control-label">Sosial Media</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="sosmed" name="sosmed"
                                                placeholder="contoh:facebook.com/netizenbaik -- @instagramusername -- @twitterusername">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="header-title">
                                <h2 style="font-size:16px !important">Data Pengaduan</h2>
                                <hr>
                            </div>
                            <div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Media</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="media" name="media" autocomplete="off"
                                                required>
                                                <option value="">-- Pilih Media --</option>
                                                @foreach ($media as $d)
                                                    <option value="{{ $d->id }}">{{ $d->media }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subyek" class="col-sm-2 control-label">Subyek</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="subyek" name="subyek"
                                                placeholder="Isikan ubyek pengaduan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian" class="col-sm-2 control-label">Uraian</label>
                                        <div class="col-sm-10">
                                            <textarea style="resize:vertical;" class="form-control" id="uraian"
                                                name="uraian" placeholder="Isikan uraian pengaduan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_urgent" class="col-sm-2 control-label">Aduan Darurat ?</label>
                                        <div class="col-sm-10 radio-styled">
                                            <label>
                                                <input type="radio" class="minimal" value=1 name="is_urgent"
                                                    autocomplete="off">
                                                <span style="font-weight:normal"> Ya</span>
                                            </label>
                                            <label>
                                                <input type="radio" class="minimal" value=0 name="is_urgent" checked
                                                    autocomplete="off">
                                                <span style="font-weight:normal"> Tidak</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Foto</label>
                                        <div class="col-sm-10">
                                            <input style="display:none" type="file" name="foto_1" id="foto_1"
                                                accept=".jpeg,.png,.jpg,.bmp,.gif">
                                            <label for="foto_1" class="btn btn-app img-upload" id="foto_1_label">
                                                <i class="fa fa-plus"></i>
                                                Foto 1
                                            </label>
                                            <div id="foto_1_preview"
                                                style=" display:none; position: relative; margin:10px; border:1px solid #666">

                                                <a id="foto_1_del" class="btn btn-xs btn-danger"
                                                    style="position:absolute; right:2px; top:3px">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <img style="max-width:200px;max-height:200px">

                                            </div>
                                            <input style="display:none" type="file" name="foto_2" id="foto_2"
                                                accept=".jpeg,.png,.jpg,.bmp,.gif">
                                            <label for="foto_2" class="btn btn-app img-upload" id="foto_2_label">
                                                <i class="fa fa-plus"></i>
                                                Foto 2
                                            </label>
                                            <div id="foto_2_preview"
                                                style=" display:none; position: relative;  margin:10px; border:1px solid #666">

                                                <a id="foto_2_del" class="btn btn-xs btn-danger"
                                                    style="position:absolute; right:2px; top:3px">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <img style="max-width:200px;max-height:200px">

                                            </div>
                                            <input style="display:none" type="file" name="foto_3" id="foto_3"
                                                accept=".jpeg,.png,.jpg,.bmp,.gif">

                                            <label for="foto_3" class="btn btn-app img-upload" id="foto_3_label">
                                                <i class="fa fa-plus"></i>
                                                Foto 3
                                            </label>
                                            <div id="foto_3_preview"
                                                style=" display:none; position: relative;   margin:10px; border:1px solid #666">

                                                <a id="foto_3_del" class="btn btn-xs btn-danger"
                                                    style="position:absolute; right:2px; top:3px">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <img style="max-width:200px;max-height:200px">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mapid" class="col-sm-2 control-label">Lokasi</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" class="form-control" name="lng" id="lng" />
                                            <input type="hidden" class="form-control" name="lat" id="lat" />
                                            <div id="mapid" style="height:400px"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_lanjutan" class="col-sm-2 control-label">Lanjutan No. Aduan
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kode_lanjutan" name="kode_lanjutan"
                                                value=""
                                                placeholder="Isi no. aduan sebelumnya / Abaikan jika merupakan aduan baru">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                                    <button id="btn-save" type="button" class="btn right-bottom-button"><i
                                            class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">

    </script>
    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "500",
            "timeOut": "10000",
            "extendedTimeOut": "5000",
            'tapToDismiss': false,
        };
        $(function() {
            var mymap = L.map('mapid').setView([-7.445999016651402, 112.71844103230215], 11);
            var marker = '';

            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXJpYnJzIiwiYSI6ImNrb3V6ODhyYTAyeGwycHB0Z2RqZXZ2dTgifQ.0OhJv5NM-IiX9GE9E00CWw', {
                    attribution: '',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'your.mapbox.access.token'
                }).addTo(mymap);

            function onMapClick(e) {
                if (marker != '') {
                    mymap.removeLayer(marker);
                }
                marker = L.marker(e.latlng).addTo(mymap);

                $('#lng').val(e.latlng.lng);
                $('#lat').val(e.latlng.lat);

                $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + e.latlng.lat + '&lon=' + e
                    .latlng.lng,
                    function(data) {
                        marker.bindPopup("<b>" + data.display_name + "</b><br />" + e.latlng.lat + ', ' +
                            e.latlng.lng).openPopup();
                    });
            }

            mymap.on('click', onMapClick);

            $("#foto_1").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#foto_1_label').css('display', 'none');
                        $('#foto_1_preview img').removeAttr('src');
                        $('#foto_1_preview img').attr('src', e.target.result);
                        $('#foto_1_preview').css('display', 'inline-block');
                    }

                    reader.readAsDataURL(this.files[0]);
                } else {
                    $('#foto_1_label').css('display', 'inline-block');
                    $('#foto_1_preview').css('display', 'none');
                }
            });
            $("#foto_2").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#foto_2_label').css('display', 'none');
                        $('#foto_2_preview img').removeAttr('src');
                        $('#foto_2_preview img').attr('src', e.target.result);
                        $('#foto_2_preview').css('display', 'inline-block');
                    }

                    reader.readAsDataURL(this.files[0]);
                } else {
                    $('#foto_2_label').css('display', 'inline-block');
                    $('#foto_2_preview').css('display', 'none');
                }
            });
            $("#foto_3").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#foto_3_label').css('display', 'none');
                        $('#foto_3_preview img').removeAttr('src');
                        $('#foto_3_preview img').attr('src', e.target.result);
                        $('#foto_3_preview').css('display', 'inline-block');
                    }

                    reader.readAsDataURL(this.files[0]);
                } else {
                    $('#foto_3_label').css('display', 'inline-block');
                    $('#foto_3_preview').css('display', 'none');
                }
            });

            $("#foto_1").trigger('change');
            $("#foto_2").trigger('change');
            $("#foto_3").trigger('change');

            $('#foto_1_del').click(function() {
                $("#foto_1").val("");
                $("#foto_1").trigger('change');
            });
            $('#foto_2_del').click(function() {
                $("#foto_2").val("");
                $("#foto_2").trigger('change');
            });
            $('#foto_3_del').click(function() {
                $("#foto_3").val("");
                $("#foto_3").trigger('change');
            });
            $('#form-data').submit(function(e) {
                e.preventDefault();
            });
            $('#btn-save').click(function() {
                var b = $(this),
                    i = b.find('i'),
                    cls = i.attr('class')

                var form = $('#form-data'),
                    data = new FormData(form[0]);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('pengaduan.store') }}",
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        b.attr('disabled', 'disabled');
                        i.removeClass().addClass('fa fa-spin fa-circle-o-notch');
                    },
                    success: function(result) {
                        if (result.success) {
                            toastr['success'](result.success);
                            $('#form-data').find('input.form-control').val('');
                            $('#form-data').find('textarea.form-control').val('');
                            $('#form-data').find('input:checkbox').prop('checked', false);
                            $('#form-data').find('select option:selected').prop('selected',
                                false);
                            $('#foto_1_del').trigger('click');
                            $('#foto_2_del').trigger('click');
                            $('#foto_3_del').trigger('click');
                            if (marker != '') {
                                mymap.removeLayer(marker);
                            }
                            location.href = "/pengaduan"
                        } else {
                            $.each(result.errors, function(key, value) {
                                toastr['error'](value);
                            });
                        }
                        b.removeAttr('disabled');
                        i.removeClass().addClass(cls);

                    },
                    error: function() {
                        b.removeAttr('disabled');
                        i.removeClass().addClass(cls);
                    }
                });
            });
        })

    </script>
@endsection
