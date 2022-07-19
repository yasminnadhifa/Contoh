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
        <a href="<?= base_url('Penjualan/export') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacinf="0">
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>No Penjualan</td>
                        <td>Tanggal</td>
                        <td>Pelanggan</td>
                        <td>Total</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penjualan as $us) : ?>
                        <tr>
                            <td> <?= $i; ?>.</td>
                            <td><?= $us['no_penjualan']; ?></td>
                            <td><?= $us['tanggal']; ?></td>
                            <td><?= $us['nama']; ?></td>
                            <td><?= $us['total_bayar']; ?></td>
                            <td><?= $us['status']; ?></td>
                            <td>
                                <a href="<?= base_url('Penjualan/detail/') . $us['no_penjualan']; ?>" class="badge badge-warning">Detail</a>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>