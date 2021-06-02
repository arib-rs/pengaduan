@extends('layout/main')

@section('title', $title)

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <div class="header-title">
                            <a style="float:right;" class="btn btn-default" href="{{ url('pengaduan') }}">Kembali</a>
                            <h2>{{ $title }}</h2>
                            <hr>
                        </div>

                        <div class="row">
                            <div style="line-height:1.7" class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Informasi Aduan</div>
                                <div class="col-lg-12">
                                    <input type="hidden" id="id" value="{{ $aduan->id }}">
                                    @if (isset($prev))
                                        <div>
                                            <strong>Lanjutan Dari No. Aduan :</strong>
                                            <a class="" href="{{ url('pengaduan/' . $prev) }}">
                                                <i class="fa fa-share-square"></i>
                                                {{ $aduan->kode_lanjutan }}
                                            </a>
                                        </div>
                                    @endif
                                    <div><strong>No. Aduan :</strong> {{ $aduan->kode }}</div>
                                    <div><strong>Subyek :</strong> <br>
                                        <p style="padding-left:10px">{{ $aduan->subyek }}</p>
                                    </div>
                                    <div><strong>Uraian :</strong> <br>
                                        <p style="padding-left:10px"> {!! nl2br($aduan->uraian) !!}</p>
                                    </div>
                                    <div>
                                        @if ($aduan->status == 0)
                                            <span id="validasi-operation">
                                                <form method="POST" action="{{ url('validasi') }}"
                                                    style="display: inline-block">
                                                    @csrf
                                                    <input type="hidden" id="id" name="id" value={{ $aduan->id }}>
                                                    <button onclick="return confirm('Apakah anda yakin ?')"
                                                        id="btn-validasi" class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                        Layak
                                                    </button>
                                                </form>
                                                <a id="btn-kembalikan" class="btn btn-danger">
                                                    <i class="fa fa-times"></i>
                                                    Tidak Layak
                                                </a>
                                            </span>
                                        @endif
                                        @if ($aduan->status == 1)
                                            <span id="klasifikasi-operation">
                                                <a id="btn-klasifikasi" class="btn btn-primary">
                                                    <i class="fa fa-justify"></i>
                                                    Klasifikasi
                                                </a>
                                            </span>
                                        @endif
                                        @if ($aduan->status == 2)
                                            <span id="respon">
                                                <a id="btn-respon" class="btn btn-success">
                                                    <i class="fa fa-justify"></i>
                                                    Respon
                                                </a>
                                            </span>
                                        @endif
                                        {{-- <a href="{{ url('pengaduan') }}" id="btn-batal" class="btn btn-default">
                                            Batal
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                            <div style="line-height:1.7" class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Informasi Pelapor</div>
                                <div class="col-lg-12">
                                    <div><strong>{{ $aduan->name }}</strong></div>
                                    <div><i class="fa fa-user"></i> {{ $aduan->gender }}</div>
                                    <div><i class="fa fa-briefcase"></i> {{ $aduan->job->pekerjaan }}</div>
                                    <div><i class="fa fa-map-pin"></i>
                                        {{ $aduan->alamat . ', ' }}
                                        {{ $aduan->desa . ' - ' }}
                                        {{ $aduan->kecamatan . ', ' }}
                                        {{ $aduan->kota }}
                                    </div>
                                    <div><i class="fa fa-phone-square"></i> {{ $aduan->telepon }}</div>
                                    <div><i class="fa fa-envelope-square"></i> {{ $aduan->email }}</div>
                                </div>
                            </div>
                            <div style="line-height:1.7" class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Informasi Lain</div>
                                <div class="col-lg-12">
                                    <div>
                                        <strong>Status :</strong>
                                        {!! $status !!}
                                        {!! $aduan->alasan ? '<br><strong>Alasan :</strong> ' . $aduan->alasan : '' !!}
                                    </div>
                                    <div><strong>Media :</strong> {{ $aduan->media_->media }}</div>
                                    <div><span class="{{ $aduan->is_urgent == 1 ? 'aduan-urgent' : '' }}">
                                            <strong>Urgensi :</strong>
                                            {!! $aduan->is_urgent == 1 ? 'Darurat' : 'Biasa' !!}</span></div>
                                    <div><strong>Tgl Aduan :</strong> <br>
                                        <p style="padding-left:10px">{{ $startdate }}</p>
                                    </div>
                                    <div><strong>Tgl Maks Proses :</strong> <br>
                                        <p style="padding-left:10px">{{ $enddate . ' ' . $keterangan }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Detail Gambar</div>
                                <div class="col-lg-12">
                                    @if ($aduan->pict_1)
                                        <div style="margin:10px 10px 10px 0px; border:1px solid #666">
                                            <a href="{{ url('/upload-photo/' . $aduan->pict_1) }}">
                                                <img style="width:100%;"
                                                    src="{{ url('/upload-photo/' . $aduan->pict_1) }}">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($aduan->pict_2)
                                        <div style="margin:10px 10px 10px 0px;border:1px solid #666">
                                            <a href="{{ url('/upload-photo/' . $aduan->pict_2) }}">
                                                <img style="width:100%;"
                                                    src="{{ url('/upload-photo/' . $aduan->pict_2) }}">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($aduan->pict_3)
                                        <div style="margin:10px 10px 10px 0px;border:1px solid #666">
                                            <a href="{{ url('/upload-photo/' . $aduan->pict_3) }}">
                                                <img style="width:100%;"
                                                    src="{{ url('/upload-photo/' . $aduan->pict_3) }}">
                                            </a>
                                        </div>
                                    @endif
                                    @if (!$aduan->pict_1 && !$aduan->pict_2 && !$aduan->pict_3)
                                        - Tidak Tersedia -
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div style="margin-bottom:15px;font-size:16px">Lokasi Obyek Aduan</div>
                                <div class="col-lg-12">
                                    <input type="hidden" name="lng" id="lng" value="{{ $aduan->lng }}" />
                                    <input type="hidden" name="lat" id="lat" value="{{ $aduan->lat }}" />
                                    @if ($aduan->lng && $aduan->lat)
                                        <div id="mapid" style="height:400px"></div>
                                    @else
                                        <div id="mapid" style="display:none"></div>
                                        - Tidak Tersedia -
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Detail Progress</div>
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th style="width: 25%">Waktu</th>
                                                <th style="width: 25%">Aksi</th>
                                                <th style="width: 50%">Lokasi</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div style="line-height:1.7" class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Detail Respon</div>
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th style="width: 25%">Tanggal</th>
                                                <th style="width: 25%">Nama Bakohumas</th>
                                                <th style="width: 50%">Uraian</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div style="line-height:1.7" class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Detail Foto</div>
                            </div>
                            <div style="line-height:1.7" class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Lokasi Respon</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="ModalKembalikan" tabindex="-1" role="dialog" aria-labelledby="ModalKembalikanTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="ModalKembalikanTitle">Alasan Tidak Layak</h3>
                </div>
                <form id="form-data" method="POST" action={{ url('/kembalikan-save') }}>
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value={{ $aduan->id }}>
                        <div class="form-group">
                            <textarea style="resize:vertical;" autocomplete="off"
                                placeholder="Tuliskan alasan aduan tidak layak" class="form-control" id="alasan"
                                name="alasan" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-reset" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button id="btn-kembalikan-save" type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
    <div class="modal fade" id="ModalKlasifikasi" tabindex="-1" role="dialog" aria-labelledby="ModalKlasifikasiTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="ModalKlasifikasiTitle">Klasifikasi Aduan</h3>
                </div>
                <form id="form-klasifikasi">
                    {{-- @csrf --}}
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value={{ $aduan->id }}>
                        <input type="hidden" class="form-control" id="kode" name="kode" value={{ $aduan->kode }}>
                        <div class="form-group">
                            <label for="bidang">Pilih Klasifikasi Bidang</label>
                            @foreach ($bidang as $d)
                                <div style="margin-left:20px" class="checkbox">
                                    <label>
                                        <input type="checkbox" id="bidang{{ $d->id }}"
                                            name="bidang[{{ $d->id }}]" value="{{ $d->id }}">
                                        {{ $d->bidang }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-reset" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button id="btn-save-klasifikasi" type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalRespon" tabindex="-1" role="dialog" aria-labelledby="ModalResponTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="ModalResponTitle">Respon Aduan</h3>
                </div>
                <form id="form-respon">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value={{ $aduan->id }}>
                        <input type="hidden" class="form-control" id="kode" name="kode" value={{ $aduan->kode }}>
                        <div class="form-group">
                            <textarea style="resize:vertical;" autocomplete="off"
                                placeholder="Tuliskan uraian respon aduan" class="form-control" id="uraian"
                                name="uraian"></textarea>
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
                                <input type="hidden" class="form-control" name="lng" id="lng2" />
                                <input type="hidden" class="form-control" name="lat" id="lat2" />
                                <div id="mapid2" style="height:400px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-reset" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button id="btn-save-respon" type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>
                </form>

            </div>
        </div>
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
        $(function() {
            var pengaduan_id = $('#id').val();
            console.log(pengaduan_id);
            var dataTable = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: false,
                autoWidth: false,
                searching: false,
                ordering: false,
                info: false,
                pageLength: 0,
                paging: false,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: "../get-progresses/" + pengaduan_id,
                columns: [{
                        data: 'created_at',
                        sClass: 'text-center'
                    },
                    {
                        data: 'aksi',
                        sClass: 'text-center'
                    },
                    {
                        data: 'lokasi',
                        sClass: 'text-center'
                    }
                ]
            });


            var lng = $('#lng').val(),
                lat = $('#lat').val(),
                mymap = L.map('mapid').setView([lat, lng], 11),
                marker = '';


            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXJpYnJzIiwiYSI6ImNrb3V6ODhyYTAyeGwycHB0Z2RqZXZ2dTgifQ.0OhJv5NM-IiX9GE9E00CWw', {
                    attribution: '',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'your.mapbox.access.token'
                }).addTo(mymap);

            marker = L.marker([lat, lng]).addTo(mymap);

            $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + lat + '&lon=' + lng,
                function(data) {
                    marker.bindPopup("<b>" + data.display_name + "</b><br />" + lat + ', ' +
                        lng).openPopup();
                });

            $('#btn-kembalikan').click(function() {
                $('#ModalKembalikan').modal('show');
            })
            $('#btn-klasifikasi').click(function() {
                $('#ModalKlasifikasi').modal('show');
            })
            $('#btn-respon').click(function() {
                $('#ModalRespon').modal('show');
            })
            $('#ModalRespon').on('shown.bs.modal', function(){
                setTimeout(function() {
                    mymap2.invalidateSize();
            }, 1);
            })

            $('#form-klasifikasi').submit(function(e) {
                e.preventDefault();
            });
            $('#btn-save-klasifikasi').click(function() {
                var b = $(this),
                    i = b.find('i'),
                    cls = i.attr('class'),
                    id = $('#id').val(),
                    url = '',
                    method = '';

                var form = $('#form-klasifikasi'),
                    data = form.serializeArray();
                console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('klasifikasi') }}",
                    method: "POST",
                    data: data,
                    beforeSend: function() {
                        b.attr('disabled', 'disabled');
                        i.removeClass().addClass('fa fa-spin fa-circle-o-notch');
                    },
                    success: function(result) {
                        if (result.success) {
                            toastr['success'](result.success);
                            $('.datatable').DataTable().ajax.reload();
                            $('#ModalKlasifikasi').modal('hide');
                            $('#form-klasifikasi').find('input.form-control').val('');
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
            
            $('#form-respon').submit(function(e) {
                e.preventDefault();
            });
            $('#btn-save-respon').click(function() {
                var b = $(this),
                    i = b.find('i'),
                    cls = i.attr('class'),
                    id = $('#id').val(),
                    url = '',
                    method = '';

                var form = $('#form-respon'),
                    data = new FormData(form[0]);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('respon') }}",
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
                            $('.datatable').DataTable().ajax.reload();
                            $('#ModalRespon').modal('hide');
                            $('#form-respon').find('input.form-control').val('');
                            $('#uraian').val('');
                            $('#lng2').val('');
                            $('#lat2').val('');
                            $('#foto_1_label').css('display', 'inline-block');
                            $('#foto_1_preview').css('display', 'none');
                            $('#foto_2_label').css('display', 'inline-block');
                            $('#foto_2_preview').css('display', 'none');
                            $('#foto_3_label').css('display', 'inline-block');
                            $('#foto_3_preview').css('display', 'none');
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

            var mymap2 = L.map('mapid2').setView([-7.445999016651402, 112.71844103230215], 11);
            var marker2 = '';

            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXJpYnJzIiwiYSI6ImNrb3V6ODhyYTAyeGwycHB0Z2RqZXZ2dTgifQ.0OhJv5NM-IiX9GE9E00CWw', {
                    attribution: '',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'your.mapbox.access.token'
                }).addTo(mymap2);

            function onMapClick(e) {
                if (marker2 != '') {
                    mymap2.removeLayer(marker2);
                }
                marker2 = L.marker(e.latlng).addTo(mymap2);

                $('#lng2').val(e.latlng.lng);
                $('#lat2').val(e.latlng.lat);

                $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + e.latlng.lat + '&lon=' + e
                    .latlng.lng,
                    function(data) {
                        marker2.bindPopup("<b>" + data.display_name + "</b><br />" + e.latlng.lat + ', ' +
                            e.latlng.lng).openPopup();
                    });
            }

            mymap2.on('click', onMapClick);

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
        })

    </script>

@endsection
