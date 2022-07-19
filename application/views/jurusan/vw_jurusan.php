<div class="container-fluid">
    <!-- <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url() ?>Mahasiswa/tambah" class="btn btn-info mb-2">Tambah
                Mahasiswa</a>
        </div> -->
    <?= $this->session->flashdata('message') ?>
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url() ?>Jurusan/tambah" class="btn btn-info mb-2">Tambah
                Jurusan</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacinf="0">

				<thead>
					<tr>
						<td>No</td>
						<td>Nama Jurusan</td>
						<td>Singkatan</td>
						<td>Kajur</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($jurusan as $us) : ?>
						<tr>
							<td> <?= $i; ?>.</td>
							<td><?= $us['nama']; ?></td>
							<td><?= $us['singkatan']; ?></td>
							<td><?= $us['kajur']; ?></td>
							<td>
								<a href="<?= base_url('Jurusan/hapus/') . $us['id']; ?>" class="badge badge-danger">Hapus</a>
								<a href="<?= base_url('Jurusan/edit/') . $us['id']; ?>" class="badge badge-warning">Edit</a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>

</div>
