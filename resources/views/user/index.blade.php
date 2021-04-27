@extends('layout/main')

@section('title', $title)

@section('container')
    <div class="content-wrapper">
        {{-- <section class="content-header">
		<h1>Pengaduan</h1>
	</section> --}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <div class="header-title">
                            <h2>{{ $title }}</h2>
                            <hr>
                        </div>
                        <div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12 overflow-y">
                                        <table class="table table-bordered table-hover datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 2%">No</th>
                                                    <th style="width: 15%">Kode</th>
                                                    <th style="width: 20%">Nama</th>
                                                    <th style="width: 15%">Email</th>
                                                    <th style="width: 10%">Tingkat</th>
                                                    <th style="width: 30%">OPD</th>
                                                    <th style="width: 8%">
                                                        <a id="btn-add" class="btn btn-xs btn-success" data-toggle="tooltip"
                                                            data-placement="left" title="Tambah Data User Baru"><i
                                                                class="fa fa-plus"></i> User Baru</a>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
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
    <div class="modal fade" id="ModalInput" tabindex="-1" role="dialog" aria-labelledby="ModalInputTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="ModalInputTitle">Form Data User</h3>
                </div>
                <form id="form-data">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value="">
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="level">Tingkat</label>
                            <input type="text" class="form-control" id="level" name="level" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="opd">OPD</label>
                            <select autocomplete="off" class="form-control" id="opd" name="opd">
                                <option value="Induk">Induk</option>
                                <option value="Sub">Sub</option>
                                <option value="Kecamatan">Kecamatan</option>
                                <option value="Desa/Kelurahan">Desa/Kelurahan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-reset" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button id="btn-save" type="button" class="btn btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(function() {
            var dataTable = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: false,
                autoWidth: false,
                searching: true,
                ordering: false,
                info: true,
                pageLength: 10,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get-users') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kode',
                        name: 'kode'
                    },
                    {
                        data: 'name',
                        name: 'nama'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'level.level',
                        name: 'level'
                    },
                    {
                        data: 'unit.nama',
                        name: 'unit'
                    },
                    {
                        data: 'Aksi',
                        name: 'Aksi',
                        orderable: false,
                        serachable: false,
                        sClass: 'text-center'
                    }
                ]

            });

            $('#form-data').submit(function(e) {
                e.preventDefault();
            });
            $('#btn-add').click(function() {
                //reset
                $('#form-data').find('input.form-control').val('');
                $('#form-data').find('textarea.form-control').val('');
                $('#form-data').find('#btn-save').html('<i class="fa fa-save"></i> Simpan');
                //show modal
                $('#ModalInput').modal('show');
            });
            $('#btn-save').click(function() {
                var b = $(this),
                    i = b.find('i'),
                    cls = i.attr('class'),
                    id = $('#id').val(),
                    url = '',
                    method = '';

                var form = $('#form-data'),
                    data = form.serializeArray();

                if (id == '') {
                    url = "{{ route('user.store') }}";
                    method = 'POST';
                } else {
                    url = "user/" + id;
                    method = 'PUT';
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: method,
                    data: data,
                    beforeSend: function() {
                        b.attr('disabled', 'disabled');
                        i.removeClass().addClass('fa fa-spin fa-circle-o-notch');
                    },
                    success: function(result) {
                        if (result.success) {
                            toastr['success'](result.success);
                            $('.datatable').DataTable().ajax.reload();
                            $('#ModalInput').modal('hide');
                            $('#form-data').find('input.form-control').val('');
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
        }).on('click', '#btn-edit', function() {
            var b = $(this),
                i = b.find('i'),
                cls = i.attr('class'),
                id = $(this).data('id');

            var form = $('#form-data');
            $.ajax({
                url: "user/" + id + "/edit",
                method: 'GET',
                beforeSend: function() {
                    b.attr('disabled', 'disabled');
                    i.removeClass().addClass('fa fa-spin fa-circle-o-notch');
                },
                success: function(result) {
                    form.find('#btn-save').html('<i class="fa fa-pencil"></i> Edit');
                    form.find('#id').val(result.id);
                    form.find('#kode').val(result.kode);
                    form.find('#nama').val(result.nama);
                    form.find('#alamat').val(result.alamat);
                    form.find('#telepon').val(result.telepon);
                    form.find('#email').val(result.email);
                    form.find('#tingkat option[value="' + result.tingkat + '"]').attr('selected',
                        'selected');
                    b.removeAttr('disabled');
                    i.removeClass().addClass(cls);
                    $('#ModalInput').modal('show');
                },
                error: function() {
                    b.removeAttr('disabled');
                    i.removeClass().addClass(cls);
                }
            });
        }).on('click', '#btn-delete', function() {
            var b = $(this),
                i = b.find('i'),
                cls = i.attr('class'),
                id = $(this).data('id');
            var del = confirm("Apakah anda yakin menghapus data ini?");
            if (del) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "user/" + id,
                    method: 'DELETE',
                    beforeSend: function() {
                        b.attr('disabled', 'disabled');
                        i.removeClass().addClass('fa fa-spin fa-circle-o-notch');
                    },
                    success: function(result) {
                        $('.datatable').DataTable().ajax.reload();
                        toastr['success'](result.success);
                    },
                    error: function() {
                        b.removeAttr('disabled');
                        i.removeClass().addClass(cls);
                    }
                });
            }

        });

    </script>

@endsection
