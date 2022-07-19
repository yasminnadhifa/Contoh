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
						<input type="hidden" name="id" value="<?= $jurusan['id']; ?>">
						<div class="form-group">
							<label for="nama">Nama Jurusan</label>
							<input name="nama" value="<?= $jurusan['nama']; ?>" type="text" class="form-control" id="nama" placeholder="Nama Jurusan">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="singkatan">Singkatan</label>
							<input name="singkatan" value="<?= $jurusan['singkatan']; ?>" type="text" class="form-control" id="singkatan" placeholder="Singkatan">
							<?= form_error('singkatan', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="kajur">Kajur</label>
							<input value="<?= $jurusan['kajur']; ?>" name="kajur" type="text" class="form-control" id="kajur" placeholder="Kajur">
							<?= form_error('kajur', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<a href="<?= base_url('Jurusan') ?>" class="btn btn-danger">Tutup</a>
						<button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Jurusan</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
