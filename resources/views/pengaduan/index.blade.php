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
                                    <div class="col-md-8">
                                        <form class="form-horizontal">
                                            <label for="nama" class="col-xs-3 control-label">Pengaduan Bulan</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="bulan" name="bulan">
                                                    <option>Januari</option>
                                                    <option>Februari</option>
                                                    <option>Maret</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" id="tahun" name="tahun"
                                                    placeholder="Tahun">
                                            </div>
                                            <div class="col-md-3">
                                                <a href="" class="right-bottom-button" style="float: left;"><i
                                                        class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Lihat</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5rem;">
                                    <div class="col-md-12 overflow-y">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>TANGGAL TERIMA</th>
                                                    <th>SUBYEK</th>
                                                    <th>STATUS</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>23-12-2020</td>
                                                    <td>Example</td>
                                                    <td>Proses</td>
                                                    <td><i class="edit-icon fa fa-pencil"></i>&nbsp;&nbsp;<i
                                                            class="delete-icon fa fa-trash"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>23-12-2020</td>
                                                    <td>Try</td>
                                                    <td>Proses</td>
                                                    <td><i class="edit-icon fa fa-pencil"></i>&nbsp;&nbsp;<i
                                                            class="delete-icon fa fa-trash"></i></td>
                                                </tr>
                                            </tbody>
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

@section('scripts')

    <script>
        $(function() {
            // $('#example2').DataTable()
            $('#example1').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': false
            })
        })

    </script>

@endsection
