<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Sembako
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $sembako['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Sembako</label>
                            <input name="nama" value="<?= $sembako['nama']; ?>" type="text" class="form-control" id="nama" placeholder="Nama Sembako">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="stok">stok</label>
                            <input name="stok" value="<?= $sembako['stok']; ?>" type="text" class="form-control" id="stok" placeholder="Ruangan">
                            <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="harga">harga</label>
                            <input value="<?= $sembako['harga']; ?>" name="harga" type="text" class="form-control" id="harga" placeholder="Jurusan">
                            <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <img src="<?= base_url('assets/img/sembako/') . $sembako['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                <label for="gambar" class="custom-file-label">Choose File</label>
                                <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <a href="<?= base_url('Sembako') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Sembako</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>