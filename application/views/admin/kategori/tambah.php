<div class="container">
    <div class="col-md-6">
        <form action="<?= base_url('admin/kategori/tambah'); ?>" class="form-horizontal" method="POST">
            <div class="form-group">
                <label for="">Kode</label>
                <input type="text" name="kode" placeholder="Masukkan Kode Barang" class="form-control" value="" readonly>
                <small><span class="text-danger"><?= form_error('kode'); ?></span></small>
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <input type="text" name="name" placeholder="Masukkan Kategori" class="form-control">
                <small><span class="text-danger"><?= form_error('name'); ?></span></small>
            </div>

            <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="description" placeholder="Masukkan Deskripsi" class="form-control">
                <small><span class="text-danger"><?= form_error('description'); ?></span></small>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Tambah Data</button>
            <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-success mb-2">Kembali</a>
        </form>
    </div>
</div>