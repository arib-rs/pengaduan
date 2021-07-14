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

                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label style="font-weight:normal">Tahun </label>
                                    <select style="margin-bottom:20px" id="tahun" autocomplete="off">
                                        @if (count($tahun) > 1)
                                            <option value="all" @if ($y == 'all') selected @endif>Semua</option>
                                        @endif
                                        @foreach ($tahun as $value)
                                            <option value='{{ $value->year }}' @if ($y == $value->year) selected @endif>
                                                {{ $value->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <a href="/pengaduan?s=all&y={{ $y }}">
                                        <div class="callout col-lg-12"
                                            style="border-left:5px solid #36b9cc;background:#ecf0f5;overflow:hidden">
                                            <div class="col-lg-10">
                                                <p>Pengaduan Masuk</p>
                                                <h2>{{ $total }}
                                                    <small @if ($baru > 0) style="color:#00a65a" @endif>
                                                        ( {{ $baru }} aduan baru )</small>
                                                </h2>
                                            </div>
                                            <div style="position: absolute; right:-5px;top:15px">
                                                <i class="fa fa-inbox fa-5x" style="color:#888"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3">
                                    <a href="/pengaduan?s=1&y={{ $y }}">
                                        <div class="callout col-lg-12"
                                            style="border-left:5px solid #f6c23e;background:#ecf0f5;overflow:hidden">
                                            <div class="col-lg-9">
                                                <p>Belum Klasifikasi</p>
                                                <h2>{{ $klasifikasi }}</h2>
                                            </div>
                                            <div style="position: absolute; right:-5px;top:15px">
                                                <i class="fa fa-list fa-5x" style="color:#888"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3">
                                    <a href="/pengaduan?s=2&y={{ $y }}">
                                        <div class="callout col-lg-12"
                                            style="border-left:5px solid #e74a3b;background:#ecf0f5;overflow:hidden">
                                            <div class="col-lg-9">
                                                <p>Belum Direspon</p>
                                                <h2>{{ $respon }}</h2>
                                            </div>
                                            <div style="position: absolute; right:-5px;top:15px">
                                                <i class="fa fa-commenting fa-5x" style="color:#888"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3">
                                    <a href="/pengaduan?s=9&y={{ $y }}">
                                        <div class="callout col-lg-12"
                                            style="border-left:5px solid #00a65a;background:#ecf0f5;overflow:hidden">
                                            <div class="col-lg-10">
                                                <p>Pengaduan Selesai</p>
                                                <h2>{{ $selesai }}</h2>
                                            </div>
                                            <div style="position: absolute; right:-5px;top:15px">
                                                <i class="fa fa-check-square-o fa-5x" style="color:#888"></i>
                                            </div>
                                        </div>
                                    </a>
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
            $("#tahun").on('change', function() {
                var tahun = $(this).val();
                window.open("dashboard?y=" + tahun, "_self");
                $('a[href^="/pengaduan?s="]').each(function() {
                    var oldUrl = $(this).attr("href"); // Get current url
                    var newUrl = oldUrl.split('y=')[0]; // Create new url
                    newUrl = newUrl + 'y=' + tahun;
                    $(this).attr("href", newUrl); // Set herf value
                });
            });
        });

    </script>
@endsection
