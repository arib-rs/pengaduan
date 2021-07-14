@extends('layout/main')

@section('title', $title)

@section('container')
    <div class="content-wrapper">
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
                                    <div class="col-md-8">
                                        <input type="hidden" id="s" value="{{ $s }}">
                                        <input type="hidden" id="y" value="{{ $y }}">
                                        <form id="form-bulan" class="form-horizontal">
                                            <label for="bulan" class="col-md-1 control-label">Bulan</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="bulan" name="bulan" autocomplete="off">
                                                    @foreach ($bulan as $key => $d)
                                                        <option value={{ $key }} @if (date('n') == $key) selected @endif>{{ $d }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" id="tahun" name="tahun"
                                                    placeholder="Tahun" value="{{ date('Y') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <button id="btn-tampil" class="btn right-bottom-button"
                                                    style="float: left;"><i
                                                        class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Tampilkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 overflow-y">
                                        <table class="table table-bordered table-hover datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 2%">No</th>
                                                    <th style="width: 10%">No. Aduan</th>
                                                    <th style="width: 10%">Tanggal</th>
                                                    <th style="width: 25%">Subyek</th>
                                                    <th style="width: 15%">Nama Pelapor</th>
                                                    <th style="width: 20%">Alamat</th>
                                                    <th style="width: 10%">Status</th>
                                                    <th style="width: 8%">Aksi</th>
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

@section('css')

@endsection
@section('scripts')

    <script>
        $(function() {

            var s = $('#s').val(),
                y = $('#y').val(),
                tahun = $('#tahun').val(),
                bulan = $('#bulan').val();
            var dataTable = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: false,
                autoWidth: false,
                searching: true,
                ordering: false,
                info: true,
                pageLength: 20,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: "get-pengaduans-bymonth/" + tahun + "/" + bulan + "/" + s + "/" + y,
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'kode'
                    },
                    {
                        data: 'created_at',
                        sClass: 'text-center'
                    },
                    {
                        data: 'subyek'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'alamat'
                    },
                    {
                        data: 'status',
                        sClass: 'text-center'
                    },
                    {
                        data: 'Aksi',
                        orderable: false,
                        serachable: false,
                        sClass: 'text-center'
                    }
                ]

            });

            $('#form-bulan').submit(function(e) {
                e.preventDefault();
            });
            $('#btn-tampil').click(function() {

                tahun = $('#tahun').val();
                bulan = $('#bulan').val();

                $('.datatable').DataTable().ajax.url("get-pengaduans-bymonth/" + tahun +
                    "/" + bulan).load();
            });

        })

    </script>

@endsection
