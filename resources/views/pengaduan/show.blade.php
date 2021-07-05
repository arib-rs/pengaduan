@extends('layout/main')

@section('title', $title)

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <div class="header-title">
                            <div style="float:right;">
                                @if (session()->get('user.level_id') != 9)
                                    @if (in_array(session()->get('user.level_id'), [1, 2]))
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
                                    @endif
                                    @if (in_array(session()->get('user.level_id'), [1, 2]))
                                        @if ($aduan->status == 1)
                                            <span id="klasifikasi-operation">
                                                <a id="btn-klasifikasi" class="btn btn-primary">
                                                    <i class="fa fa-justify"></i>
                                                    Klasifikasi
                                                </a>
                                            </span>
                                        @endif
                                    @endif
                                    @if (in_array(session()->get('user.level_id'), [1, 6]))
                                        @if ($aduan->status == 3 && $statusRespon != null)
                                            <span id="respon">
                                                <a id="btn-tindaklanjut" class="btn btn-success">
                                                    <i class="fa fa-justify"></i>
                                                    Tindak Lanjut
                                                </a>
                                            </span>
                                        @elseif (($aduan->status == 2) || ($aduan->status == 3 && $statusRespon ==
                                            null))
                                            <span id="respon">
                                                <a id="btn-respon" class="btn btn-success">
                                                    <i class="fa fa-justify"></i>
                                                    Respon
                                                </a>
                                            </span>
                                        @endif
                                    @endif
                                @endif

                                <a class="btn btn-default" href="{{ url()->previous() }}">Kembali</a>
                            </div>
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
                                    @if ($aduan->sosmed != '')
                                        <div><i class="fa fa-address-card"></i> {{ $aduan->sosmed }}</div>
                                    @endif
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
                                    <div><span class="{{ $statusTerlambat ? $statusTerlambat : '' }}">
                                            <strong>Tgl Maks Proses :</strong> <br>
                                            <p style="padding-left:10px" class="{{ $statusTerlambat }}">
                                                {{ $enddate . ' ' . $keterangan }} </p>
                                        </span>
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
                                            <a href="{{ url('/upload-photo/' . $aduan->pict_1) }}" target="_blank">
                                                <img style="width:100%;"
                                                    src="{{ url('/upload-photo/' . $aduan->pict_1) }}">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($aduan->pict_2)
                                        <div style="margin:10px 10px 10px 0px;border:1px solid #666">
                                            <a href="{{ url('/upload-photo/' . $aduan->pict_2) }}" target="_blank">
                                                <img style="width:100%;"
                                                    src="{{ url('/upload-photo/' . $aduan->pict_2) }}">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($aduan->pict_3)
                                        <div style="margin:10px 10px 10px 0px;border:1px solid #666">
                                            <a href="{{ url('/upload-photo/' . $aduan->pict_3) }}" target="_blank">
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
                                    @if ($aduan->lokasi != '')
                                        <div>{{ $aduan->lokasi }}</div><br>
                                    @endif
                                    <input type="hidden" name="lng" id="lng" value="{{ $aduan->lng }}" />
                                    <input type="hidden" name="lat" id="lat" value="{{ $aduan->lat }}" />
                                    @if ($aduan->lng && $aduan->lat)
                                        <div id="mapid" style="height:400px"></div>
                                    @else
                                        <div id="mapid" style="display:none"></div>
                                        - Map Tidak Tersedia -
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
                        {{-- <div class="row">
                            <div style="line-height:1.7" class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Detail Respon</div>
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover datatable-respon">
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
                                <div class="col-lg-12">
                                    @if ($respon == null)
                                        - Tidak Tersedia -
                                    @elseif ($respon->pict_1)
                                        <div style="margin:10px 10px 10px 0px; border:1px solid #666">
                                            <a href="{{ url('/upload-photo/' . $respon->pict_1) }}">
                                                <img style="width:100%;"
                                                    src="{{ url('/upload-photo/' . $respon->pict_1) }}">
                                            </a>
                                        </div>
                                    @elseif ($respon->pict_2)
                                        <div style="margin:10px 10px 10px 0px;border:1px solid #666">
                                            <a href="{{ url('/upload-photo/' . $respon->pict_2) }}">
                                                <img style="width:100%;"
                                                    src="{{ url('/upload-photo/' . $respon->pict_2) }}">
                                            </a>
                                        </div>
                                    @elseif ($respon->pict_3)
                                        <div style="margin:10px 10px 10px 0px;border:1px solid #666">
                                            <a href="{{ url('/upload-photo/' . $respon->pict_3) }}">
                                                <img style="width:100%;"
                                                    src="{{ url('/upload-photo/' . $respon->pict_3) }}">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div style="line-height:1.7" class="col-lg-4">
                                <div style="margin-bottom:5px;font-size:16px">Lokasi Respon</div>
                                <div class="col-lg-12">
                                    @if ($respon == null)
                                        <div id="mapid3" style="display:none"></div>
                                        - Tidak Tersedia -
                                    @elseif ($respon->long && $respon->lat)
                                        <input type="hidden" name="lng3" id="lng3" value="{{ $respon->long }}" />
                                        <input type="hidden" name="lat3" id="lat3" value="{{ $respon->lat }}" />
                                        <div id="mapid3" style="height:400px"></div>
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                        @if (count($responAll) > 0)
                            <hr>
                            <div style="margin-bottom:15px;font-size:16px">Respon</div>
                            <?php $i = 1; ?>
                            @foreach ($responAll as $ra)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="callout col-lg-12"
                                            style="border-left:5px solid #00a65a;background:#ecf0f5">
                                            <h4 class="col-lg-12">{{ $ra->user->unit->nama }}
                                                <small>{{ $ra->created_at->format('d-m-Y') }}</small>
                                            </h4>
                                            <div class="clearfix"></div>
                                            <div class="col-lg-12">
                                                <p style="margin-bottom:20px;text-indent:17px">{{ $ra->uraian }}</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-lg-12">
                                                @if ($ra->pict_1 != null)
                                                    <a href="{{ url('/upload-photo/' . $ra->pict_1) }}" target="_blank">
                                                        <img style="max-width:100%;max-height:300px"
                                                            src="{{ url('/upload-photo/' . $ra->pict_1) }}">
                                                    </a>
                                                @endif
                                                @if ($ra->pict_2 != null)
                                                    <a href="{{ url('/upload-photo/' . $ra->pict_2) }}" target="_blank">
                                                        <img style="max-width:100%;max-height:300px"
                                                            src="{{ url('/upload-photo/' . $ra->pict_2) }}">
                                                    </a>
                                                @endif
                                                @if ($ra->pict_3 != null)
                                                    <a href="{{ url('/upload-photo/' . $ra->pict_3) }}" target="_blank">
                                                        <img style="max-width:100%;max-height:300px"
                                                            src="{{ url('/upload-photo/' . $ra->pict_3) }}">
                                                    </a>
                                                @endif
                                            </div>
                                            {{-- <div class="col-lg-4 show-maps">
                                                <input class="lng1" type="hidden" name="lng1" id="lng1"
                                                    value="{{ $ra->long }}" />
                                                <input class="lat1" type="hidden" name="lat1" id="lat1"
                                                    value="{{ $ra->lat }}" />
                                                <input type="hidden" name="responid" id="responid"
                                                    value="{{ $ra->id }}"> --}}
                                            {{-- <div class="mapid-respon" id="mapid-respon" style="height:200px"></div> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            @endforeach
                        @endif
                        @if (count($tindakLanjut) > 0)
                            <hr>
                            <div style="margin-bottom:15px;font-size:16px">Tindak Lanjut</div>
                            @foreach ($tindakLanjut as $tl)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="callout col-lg-12"
                                            style="line-height:1.7;border-left:5px solid #00a65a;background:#ecf0f5">
                                            <h4 class="col-lg-12">{{ $ra->user->unit->nama }}
                                                <small>{{ $ra->created_at->format('d-m-Y') }}</small>
                                            </h4>
                                            <div class="col-lg-6" style="padding-left:40px">
                                                <table>
                                                    <tr>
                                                        <th style="text-align: left">Tanggal Mulai Pelaksanaan</th>
                                                        <th>&emsp;:&emsp;</th>
                                                        <td style="text-align: left">{{ $tl->tgl_mulai }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: left">Tanggal Selesai Pelaksanaan</th>
                                                        <th>&emsp;:&emsp;</th>
                                                        <td style="text-align: left">{{ $tl->tgl_selesai }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: left">Kegiatan yang dilaksanakan</th>
                                                        <th>&emsp;:&emsp;</th>
                                                        <td style="text-align: left">{{ $tl->kegiatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: left">Biaya</th>
                                                        <th>&emsp;:&emsp;</th>
                                                        <td style="text-align: left">{{ $tl->biaya }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table>
                                                    <tr>
                                                        <th style="text-align: left">Sumber Dana</th>
                                                        <th>&emsp;:&emsp;</th>
                                                        <td style="text-align: left">{{ $tl->sumber }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: left">Dasar Pelaksanaan </th>
                                                        <th>&emsp;:&emsp;</th>
                                                        <td style="text-align: left">{{ $tl->dasar }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: left">Tanggal Dokumen</th>
                                                        <th>&emsp;:&emsp;</th>
                                                        <td style="text-align: left">{{ $tl->tgl_dokumen }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: left">Nomor Dokumen</th>
                                                        <th>&emsp;:&emsp;</th>
                                                        <td style="text-align: left">{{ $tl->no_dokumen }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: left">Rekanan</th>
                                                        <th>&emsp;:&emsp;</th>
                                                        <td style="text-align: left">{{ $tl->rekanan }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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
                            <textarea style="resize:vertical;" autocomplete="off" placeholder="Tuliskan uraian respon aduan"
                                class="form-control" id="uraian" name="uraian"></textarea>
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
                            <label for="lokasi2" class="col-sm-2 control-label">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lokasi" id="lokasi2"
                                    placeholder="Tuliskan detail lokasi" autocomplete="off" value="{{ $aduan->lokasi }}">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="lng" id="lng2"
                                    value="{{ $aduan->lng }}" />
                                <input type="hidden" class="form-control" name="lat" id="lat2"
                                    value="{{ $aduan->lat }}" />
                                <div id="mapid2" style="height:400px"></div>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="modal-footer">
                        <button id="btn-reset" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button id="btn-save-respon" type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalTindakLanjut" tabindex="-1" role="dialog" aria-labelledby="ModalTindakLanjutTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="ModalTindakLanjutTitle">Tindak Lanjut Aduan</h3>
                </div>
                <form id="form-tindaklanjut">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value={{ $aduan->id }}>
                        <input type="hidden" class="form-control" id="kode" name="kode" value={{ $aduan->kode }}>
                        <div class="form-group">
                            <label for="tgl">Tanggal Pelaksanaan</label>
                            <br>Mulai<input type="date" class="form-control" id="tglmulai" name="tglmulai">
                            Selesai<input type="date" class="form-control" id="tglselesai" name="tglselesai">
                        </div>
                        <div class="form-group">
                            <label for="kegiatan">Kegiatan yang dilaksanakan</label>
                            <input type="text" class="form-control" id="kegiatan" name="kegiatan"
                                placeholder="Detail kegiatan yang dilaksanakan">
                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <input type="number" class="form-control" id="biaya" name="biaya" placeholder="Rp. "
                                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                        <div class="form-group">
                            <label for="sumber">Sumber Dana</label>
                            <select autocomplete="off" class="form-control" id="sumber" name="sumber">
                                <option value="APBD I">APBD I</option>
                                <option value="APBD II">APBD II</option>
                            </select>
                            <input type="text" class="form-control" id="detailsumber" name="detailsumber"
                                placeholder="Detail Sumber Dana">
                        </div>
                        <div class="form-group">
                            <label for="dasar">Dasar Pelaksanaan Kegiatan</label>
                            <input type="text" class="form-control" id="dasar" name="dasar"
                                placeholder="Misalnya Surat Perintah Kerja">
                        </div>
                        <div class="form-group">
                            <label for="tgldokumen">Tanggal Dokumen</label>
                            <input type="date" class="form-control" id="tgldokumen" name="tgldokumen">
                        </div>
                        <div class="form-group">
                            <label for="nodokumen">Nomor Dokumen</label>
                            <input type="text" class="form-control" id="nodokumen" name="nodokumen"
                                placeholder="Mis: 028/101/404.4.7/2021">
                        </div>
                        <div class="form-group">
                            <label for="rekanan">Rekanan</label>
                            <input type="text" class="form-control" id="rekanan" name="rekanan" placeholder="Nama Rekanan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-reset" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button id="btn-save-tindaklanjut" type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
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
            // console.log(pengaduan_id);
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

            //map1
            var lng = $('#lng').val(),
                lat = $('#lat').val(),
                mymap = L.map('mapid').setView([lat, lng], 13),
                marker = '';

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);
            // L.tileLayer(
            //     'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXJpYnJzIiwiYSI6ImNrb3V6ODhyYTAyeGwycHB0Z2RqZXZ2dTgifQ.0OhJv5NM-IiX9GE9E00CWw', {
            //         attribution: '',
            //         maxZoom: 18,
            //         id: 'mapbox/streets-v11',
            //         tileSize: 512,
            //         zoomOffset: -1,
            //         accessToken: 'your.mapbox.access.token'
            //     }).addTo(mymap);

            marker = L.marker([lat, lng]).addTo(mymap);

            $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + lat + '&lon=' + lng,
                function(data) {
                    marker.bindPopup("<b>" + data.display_name + "</b><br />" + lat + ', ' +
                        lng).openPopup();
                });
            //map2
            var mymap2 = L.map('mapid2').setView([lat, lng], 13),
                // var mymap2 = L.map('mapid2').setView([-7.445999016651402, 112.71844103230215], 11);
                marker2 = '';
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap2);

            // L.tileLayer(
            //     'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXJpYnJzIiwiYSI6ImNrb3V6ODhyYTAyeGwycHB0Z2RqZXZ2dTgifQ.0OhJv5NM-IiX9GE9E00CWw', {
            //         attribution: '',
            //         maxZoom: 18,
            //         id: 'mapbox/streets-v11',
            //         tileSize: 512,
            //         zoomOffset: -1,
            //         accessToken: 'your.mapbox.access.token'
            //     }).addTo(mymap2);

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

            $('#btn-kembalikan').click(function() {
                $('#ModalKembalikan').modal('show');
            })
            $('#btn-klasifikasi').click(function() {
                $('#ModalKlasifikasi').modal('show');
            })
            $('#btn-respon').click(function() {
                $('#ModalRespon').modal('show');
            })
            $('#btn-tindaklanjut').click(function() {
                $('#ModalTindakLanjut').modal('show');
            })
            $('#ModalRespon').on('shown.bs.modal', function() {
                setTimeout(function() {
                    mymap2.invalidateSize();
                }, 1);
                if (marker2 != '') {
                    mymap2.removeLayer(marker2);
                }
                marker2 = L.marker([lat, lng]).addTo(mymap2);
                $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + lat + '&lon=' +
                    lng,
                    function(data) {
                        marker2.bindPopup("<b>" + data.display_name + "</b><br />" + lat + ', ' +
                            lng).openPopup();
                    });
                mymap2.setView(new L.LatLng(lat, lng), 11);
                $('#lng2').val(lng);
                $('#lat2').val(lat);
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
                // console.log(data);

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
                            location.reload();
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
                            location.reload();
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

            var dataTable = $('.datatable-respon').DataTable({
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
                ajax: "../get-responses/" + pengaduan_id,
                columns: [{
                        data: 'created_at',
                        sClass: 'text-center'
                    },
                    {
                        data: 'nama',
                        sClass: 'text-center'
                    },
                    {
                        data: 'uraian',
                        sClass: 'text-center'
                    }
                ]
            });



            $('#form-tindaklanjut').submit(function(e) {
                e.preventDefault();
            });
            $('#btn-save-tindaklanjut').click(function() {
                var b = $(this),
                    i = b.find('i'),
                    cls = i.attr('class'),
                    id = $('#id').val(),
                    url = '',
                    method = '';

                var form = $('#form-tindaklanjut'),
                    data = new FormData(form[0]);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('followup') }}",
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
                            $('#ModalTindakLanjut').modal('hide');
                            $('#form-tindaklanjut').find('input.form-control').val('');
                            location.reload();
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

            // itr = 8;
            $('.show-maps').each(function(i) {
                var lng3 = $(this).find('input.lng1').val(),
                    lat3 = $(this).find('input.lat1').val(),
                    mymap3 = L.map('mapid-respon').setView([lat3, lng3], 13),
                    marker3 = '';
                // console.log('input.lng1'+i);
  
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap3);
                // L.tileLayer(
                //     'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXJpYnJzIiwiYSI6ImNrb3V6ODhyYTAyeGwycHB0Z2RqZXZ2dTgifQ.0OhJv5NM-IiX9GE9E00CWw', {
                //         attribution: '',
                //         maxZoom: 18,
                //         id: 'mapbox/streets-v11',
                //         tileSize: 512,
                //         zoomOffset: -1,
                //         accessToken: 'your.mapbox.access.token'
                //     }).addTo(mymap3);

                marker3 = L.marker([lat3, lng3]).addTo(mymap3);

                $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + lat3 + '&lon=' +
                    lng3,
                    function(data) {
                        marker3.bindPopup("<b>" + data.display_name + "</b><br />" + lat3 + ', ' +
                            lng3).openPopup();
                    });
            });


        })

    </script>

@endsection
