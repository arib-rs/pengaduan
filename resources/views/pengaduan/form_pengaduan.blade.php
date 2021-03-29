@extends('layout/main')

@section('title', 'Form Pengaduan')

@section('container')
<div class="content-wrapper">
	<section class="content-header">
		<h1>Pengaduan</h1>
	</section>

	<section class="content">
		<form class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="white-box">
						<div class="header-title">
							<h2><i class="fa fa-edit"></i> Form Data Pelapor</h2>
							<hr>
						</div>
						<div>
							<div class="box-body">
				                <div class="form-group">
				                  	<label for="nama" class="col-sm-2 control-label">Nama</label>
				                  	<div class="col-sm-10">
				                    	<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
				                  	</div>
				                </div>
				                <div class="form-group">
				                  	<label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
				                  	<div class="col-sm-10 radio-styled">
				                    	<label>
						                  	<input type="radio" class="minimal" name="jk" checked>
						                  	<i class="fa fa-male" aria-hidden="true"></i>
						                </label>
						                <label>
						                  	<input type="radio" class="minimal" name="jk">
						                  	<i class="fa fa-female" aria-hidden="true"></i>
						                </label>
				                  	</div>
				                </div>
				                <div class="form-group">
				                	<label for="alamat" class="col-sm-2 control-label">Alamat</label>
				                	<div class="col-sm-10">
				                		<div class="form-group">
				                			<label for="jalan" class="col-sm-2 control-label">Jalan</label>
						                  	<div class="col-sm-10">
						                    	<input type="text" class="form-control" id="jalan" name="jalan" placeholder="Jalan">
						                  	</div>
				                		</div>
				                		<div class="form-group">
				                			<label for="desa" class="col-sm-2 control-label">Desa</label>
						                  	<div class="col-sm-10">
						                    	<input type="text" class="form-control" id="desa" name="desa" placeholder="Desa">
						                  	</div>
				                		</div>
				                		<div class="form-group">
				                			<label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
						                  	<div class="col-sm-10">
						                    	<input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
						                  	</div>
				                		</div>
				                		<div class="form-group">
				                			<label for="kota" class="col-sm-2 control-label">Kota</label>
						                  	<div class="col-sm-10">
						                    	<input type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
						                  	</div>
				                		</div>
				                	</div>
				                </div>
				                <div class="form-group">
				                  	<label class="col-sm-2 control-label">Pekerjaan</label>
				                  	<div class="col-sm-10">
					                  	<select class="form-control" id="pekerjaan" name="pekerjaan">
						                    <option>option 1</option>
						                    <option>option 2</option>
						                    <option>option 3</option>
						                    <option>option 4</option>
						                    <option>option 5</option>
					                  	</select>
				                  	</div>
				                </div>
				                <div class="form-group">
				                  	<label for="telepon" class="col-sm-2 control-label">Telepon</label>
				                  	<div class="col-sm-10">
				                    	<input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon">
				                  	</div>
				                </div>
				                <div class="form-group">
				                  	<label for="faksimili" class="col-sm-2 control-label">Faksimili</label>
				                  	<div class="col-sm-10">
				                    	<input type="text" class="form-control" id="faksimili" name="faksimili" placeholder="Faksimili">
				                  	</div>
				                </div>
				                <div class="form-group">
				                  	<label for="email" class="col-sm-2 control-label">E-mail</label>
				                  	<div class="col-sm-10">
				                    	<input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
				                  	</div>
				                </div>
			              	</div>
						</div>
						<div class="header-title">
							<h2><i class="fa fa-edit"></i> Form Data Pengaduan</h2>
							<hr>
						</div>
						<div>
							<div class="box-body">
				                <div class="form-group">
				                  	<label class="col-sm-2 control-label">Media</label>
				                  	<div class="col-sm-10">
					                  	<select class="form-control"><!--  select2 -->
						                    <option>option 1</option>
						                    <option>option 2</option>
						                    <option>option 3</option>
						                    <option>option 4</option>
						                    <option>option 5</option>
					                  	</select>
				                  	</div>
				                </div>
				                <div class="form-group">
				                  	<label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
				                  	<div class="col-sm-10">
				                    	<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
				                  	</div>
				                </div>
				                <div class="form-group">
				                  	<label for="subyek" class="col-sm-2 control-label">Subyek</label>
				                  	<div class="col-sm-10">
				                    	<input type="text" class="form-control" id="subyek" name="subyek" placeholder="Subyek">
				                  	</div>
				                </div>
				                <div class="form-group">
				                  	<label for="uraian" class="col-sm-2 control-label">Uraian</label>
				                  	<div class="col-sm-10">
					                  	<textarea class="form-control" id="uraian" name="uraian" placeholder="Tuliskan Pengaduan Anda Disini">
					                  	</textarea>
				                  	</div>
				                </div>
			              	</div>
			              	<!-- /.box-body -->
			              	<div class="box-footer">
				                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
				                <a href="" class="right-bottom-button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Simpan</a>
			              	</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
@endsection