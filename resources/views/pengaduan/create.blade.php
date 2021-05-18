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
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="col-sm-2 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-10 radio-styled">
                                            <label>
                                                <input type="radio" class="minimal" value="Pria" name="gender" checked>
                                                <i class="fa fa-male" aria-hidden="true"></i>
                                                <span style="font-weight:normal"> Pria</span>
                                            </label>
                                            <label>
                                                <input type="radio" class="minimal" value="Wanita" name="gender">
                                                <i class="fa fa-female" aria-hidden="true"></i>
                                                <span style="font-weight:normal"> Wanita</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label for="jalan" class="col-sm-2 control-label">Jalan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="jalan" name="jalan"
                                                        placeholder="Jalan">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="desa" class="col-sm-2 control-label">Desa</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="desa" name="desa"
                                                        placeholder="Desa">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                                        placeholder="Kecamatan">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kota" class="col-sm-2 control-label">Kota</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="kota" name="kota"
                                                        placeholder="Kota">
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
                                                    <option value="{{ $d->id }}">{{ $d->pekerjaan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon" class="col-sm-2 control-label">Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="telepon" name="telepon"
                                                placeholder="Telepon">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">E-mail</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="E-mail">
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
                                                placeholder="Subyek">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian" class="col-sm-2 control-label">Uraian</label>
                                        <div class="col-sm-10">
                                            <textarea style="resize:vertical;" class="form-control" id="uraian"
                                                name="uraian" placeholder="Tuliskan Pengaduan Anda Disini"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Foto</label>
                                        <div class="col-sm-10">
                                            <div id="pict_1_preview"
                                                style=" display:none; position: relative;  float:left; margin-right:10px">

                                                <a id="pict_1_del" class="btn btn-xs btn-danger"
                                                    style="position:absolute; right:2px; top:3px">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <img style="max-width:200px;max-height:200px">

                                            </div>
                                            <div id="pict_2_preview"
                                                style=" display:none; position: relative;  float:left;  margin-right:10px">

                                                <a id="pict_2_del" class="btn btn-xs btn-danger"
                                                    style="position:absolute; right:2px; top:3px">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <img style="max-width:200px;max-height:200px">

                                            </div>
                                            <div id="pict_3_preview"
                                                style=" display:none; position: relative;  float:left;  margin-right:10px">

                                                <a id="pict_3_del" class="btn btn-xs btn-danger"
                                                    style="position:absolute; right:2px; top:3px">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <img style="max-width:200px;max-height:200px">

                                            </div>



                                            <input style="display:none" type="file" name="pict_1" id="pict_1">
                                            <input style="display:none" type="file" name="pict_2" id="pict_2">
                                            <input style="display:none" type="file" name="pict_3" id="pict_3">
                                            <label for="pict_1" class="btn btn-app img-upload" id="pict_1_label">
                                                <i class="fa fa-plus"></i>
                                                Tambah
                                            </label>
                                            <label for="pict_2" class="btn btn-app img-upload" id="pict_2_label">
                                                <i class="fa fa-plus"></i>
                                                Tambah
                                            </label>
                                            <label for="pict_3" class="btn btn-app img-upload" id="pict_3_label">
                                                <i class="fa fa-plus"></i>
                                                Tambah
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lanjutan" class="col-sm-2 control-label">Lanjutan dari </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="lanjutan" name="lanjutan"
                                                placeholder="Isikan no. aduan">
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

@section('scripts')
    <script>
        $(function() {
            $("#pict_1").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#pict_1_label').css('display', 'none');
                        $('#pict_1_preview img').removeAttr('src');
                        $('#pict_1_preview img').attr('src', e.target.result);
                        $('#pict_1_preview').css('display', 'inline-block');
                    }

                    reader.readAsDataURL(this.files[0]);
                } else {
                    $('#pict_1_label').css('display', 'inline-block');
                    $('#pict_1_preview').css('display', 'none');
                }
            });
            $("#pict_2").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#pict_2_label').css('display', 'none');
                        $('#pict_2_preview img').removeAttr('src');
                        $('#pict_2_preview img').attr('src', e.target.result);
                        $('#pict_2_preview').css('display', 'inline-block');
                    }

                    reader.readAsDataURL(this.files[0]);
                } else {
                    $('#pict_2_label').css('display', 'inline-block');
                    $('#pict_2_preview').css('display', 'none');
                }
            });
            $("#pict_3").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#pict_3_label').css('display', 'none');
                        $('#pict_3_preview img').removeAttr('src');
                        $('#pict_3_preview img').attr('src', e.target.result);
                        $('#pict_3_preview').css('display', 'inline-block');
                    }

                    reader.readAsDataURL(this.files[0]);
                } else {
                    $('#pict_3_label').css('display', 'inline-block');
                    $('#pict_3_preview').css('display', 'none');
                }
            });

            $("#pict_1").trigger('change');
            $("#pict_2").trigger('change');
            $("#pict_3").trigger('change');

            $('#pict_1_del').click(function() {
                $("#pict_1").val("");
                $("#pict_1").trigger('change');
            });
            $('#pict_2_del').click(function() {
                $("#pict_2").val("");
                $("#pict_2").trigger('change');
            });
            $('#pict_3_del').click(function() {
                $("#pict_3").val("");
                $("#pict_3").trigger('change');
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
                            $('#pict_1_del').trigger('click');
                            $('#pict_2_del').trigger('click');
                            $('#pict_3_del').trigger('click');
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
