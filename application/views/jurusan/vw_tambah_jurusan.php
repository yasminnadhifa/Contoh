<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">
					Form Tambah Data Jurusan
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nama">Nama Jurusan</label>
							<input name="nama" type="text" value="<?= set_value('nama'); ?>" class="form-control" id="nama" placeholder="Nama Jurusan">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="singkatan">Singkatan</label>
							<input name="singkatan" type="text" value="<?= set_value('singkatan'); ?>" class="form-control" id="singkatan" placeholder="Singkatan">
							<?= form_error('singkatan', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="kajur">Kajur</label>
							<input name="kajur" type="text" value="<?= set_value('kajur'); ?>" class="form-control" id="kajur" placeholder="Kajur">
							<?= form_error('kajur', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Jurusan</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
