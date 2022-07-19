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
            <a href="<?= base_url() ?>Prodi/tambah" class="btn btn-info mb-2">Tambah
                Prodi</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacinf="0">
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama prodi</td>
                        <td>Ruangan</td>
                        <td>jurusan</td>
                        <td>akreditasi</td>
                        <td>nama kaprodi</td>
                        <td>tahun berdiri</td>
                        <td>output lulusan</td>
                        <td>gambar</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Prodi as $us) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $us['nama']; ?></td>
                            <td><?= $us['ruangan'] ?></td>
                            <td><?= $us['jurusan'] ?></td>
                            <td><?= $us['akreditasi'] ?></td>
                            <td><?= $us['nama_kaprodi'] ?></td>
                            <td><?= $us['tahun_berdiri'] ?></td>
                            <td><?= $us['output_lulusan'] ?></td>
                            <td><img src="<?= base_url('assets/img/prodi/') . $us['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="<?= base_url('Prodi/hapus/') . $us['id']; ?>" class="badge badge-danger">Hapus</a>
                                <a href="<?= base_url('Prodi/edit/') . $us['id']; ?>" class="badge badge-warning">Edit</a>
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