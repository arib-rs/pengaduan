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
                                    <div class="col-md-2">
                                        <a class="btn btn-primary" href="">
                                            <i class="fa fa-plus"></i> Tambah User Baru</a>
                                    </div>
                                    <div class="col-md-12 overflow-y" style="margin-top:-40px;">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email/Username</th>
                                                    <th>Jenis</th>
                                                    <th>Satuan Kerja</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($alluser as $d)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $d->name }}</td>
                                                        <td>{{ $d->email }}</td>
                                                        <td>{{ $d->level->level }}</td>
                                                        <td>{{ $d->unit_id }}</td>
                                                        <td>
                                                            <a href="" title="Lihat Detail"><i
                                                                    class="edit-icon fa fa-eye"></i></a>
                                                            <a href="" title="Lihat Detail"><i
                                                                    class="edit-icon fa fa-pencil"></i></a>
                                                            <a href="" title="Lihat Detail"><i
                                                                    class="delete-icon fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>

                                                @endforeach

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
