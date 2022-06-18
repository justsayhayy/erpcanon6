<div class="content-wrapper col-12">
    <!-- <?php var_dump($row) ?> -->
    <form action="<?= base_url('admin/jurnalumum/edit_jurnal') ?>" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="form-row">
            <div class="col-md-2 mb-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" placeholder="yyyy-mm-dd" name="tgl" value="<?= date('Y-m-d', strtotime($row['tgl'])) ?>" required>

            </div>
            <div class="col-md-5 mb-3">
                <label for="transaksi">Transaksi</label>
                <input type="text" name="transaksi" class="form-control" id="transaksi" placeholder="Transaksi" value="<?= $row['transaksi'] ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="no_bukti">No. Bukti</label>
                <input type="text" name="no_bukti" class="form-control" id="no_bukti" placeholder="No Bukti" value="<?= $row['no_bukti'] ?>" required readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-2 mb-3">
                <label for="jumlah">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="jumlah" value="<?= $row['jumlah'] ?>" required>
            </div>
            <div class="form-group col-md-5 mb-3">
                <label for="combine_debit">Kode Debit - Nama Akun</label>
                <select class="custom-select" name="combine_debit" required>
                    <option value="">-- Pilih Kode Debit --</option>
                    <?php foreach ($all_kas as $k) : ?>
                        <option value="<?= $k['kode'] . "-" . $k['nama'] ?>" <?= ($k['nama'] == $row['nama_akundebit']) ? 'selected' : '' ?>><?= $k['kode'] . "-" . $k['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-5 mb-3">
                <label for="combine_kredit">Kode kredit - Nama Akun</label>
                <select class="custom-select" name="combine_kredit" required>
                    <option value="">-- Pilih Kode Kredit --</option>
                    <?php foreach ($all_kas as $k) : ?>
                        <option value="<?= $k['kode'] . "-" . $k['nama'] ?>" <?= ($k['nama'] == $row['nama_akunkredit']) ? 'selected' : '' ?>><?= $k['kode'] . "-" . $k['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="didebit">Di Debit</label>
                <input class="form-control" type="text" name="didebit" id="didebit" value="<?= $row['didebit'] ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="dikredit">Di Kredit</label>
                <input class="form-control" type="text" name="dikredit" id="dikredit" value="<?= $row['dikredit'] ?>">
            </div>

        </div>
        <div class="form-check ">
            <input class="form-check-input" type="radio" name="tutup_buku" id="tutup_buku1" value="Y" <?= ($row['tutup_buku'] == 'Y') ? 'checked' : '' ?>>
            <label class="form-check-label" for="exampleRadios1">
                Ya (Untuk tutup buku)
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="tutup_buku" id="tutup_buku2" value="T" <?= ($row['tutup_buku'] == 'T') ? 'checked' : '' ?>>
            <label class="form-check-label" for="exampleRadios2">
                Tidak (Untuk tutup Buku)
            </label>
        </div>
        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
        <a href="<?= base_url('admin/jurnalumum/index') ?>" class="btn btn-warning">Kembali</a>
    </form>
</div>