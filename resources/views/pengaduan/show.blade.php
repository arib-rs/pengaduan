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
                                        <a href="{{ url('pengaduan') }}" id="btn-batal" class="btn btn-default">
                                            Batal
                                        </a>
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
                <form id="form-data" method="POST" action={{ url('/klasifikasi-save') }}>
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
        })

    </script>

@endsection
