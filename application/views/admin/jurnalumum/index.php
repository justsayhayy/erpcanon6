<div class="content-wrapper col-12">
  <section class="content-header ml mt-2 auto">

    </ol>
    <div style="margin-left:5px">

      <div class="">
        <?php if ($this->session->flashdata('flash2')) : ?>
          <div class="row mt-3">
            <div class="col md-6">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">Data Jurnal Umum <strong>berhasil </strong><?= $this->session->flashdata('flash2'); ?>
                <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('flash')) : ?>
          <div class="row mt-3">
            <div class="col md-6">
              <div class="alert alert-success alert-dismissible fade show" role="alert"><?= $this->session->flashdata('flash'); ?>
                <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <h5 class="text-bold">Jurnal Umum</h5>

        <div class="row mt-3">
          <div class="col-lg-6">
            <form action="<?= base_url() ?>admin/jurnalumum/index" method="post">
              <div class="form-group input-group input-group-sm">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="weekending">Weekending</label>
                </div>
                <select class="form-control" id="weekending" name="s">
                  <option value="">--Pilih--</option>
                  <option value="all">Show All</option>
                  <option value="up">Weekending Up</option>
                  <?php foreach ($weekending as $week) : ?>
                    <option value="<?= $week['tgl']; ?>"><?= $week['tgl']; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="input-group-prepend rounded">
                  <button class="btn btn-outline-danger" type="submit">Cari</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6">
            <form action="<?= base_url() ?>admin/jurnalumum/transaksiSearch" method="post">
              <div class="form-group input-group input-group-sm">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="s-transaksi">Transaksi</label>
                </div>
                <input type="search" class="form-control" id="s-transaksi" name="search" placeholder="Cari nama transaksi.." />
                <div class="input-group-prepend rounded">
                  <button class="btn btn-outline-info" type="submit">Cari</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#jurnalModal" id="jurnal" onclick="content(title = 'Input Data Jurnal')"><i class="fa fa-plus"></i>
          Jurnal
        </button>

        <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#jurnalModal" id="pjurnal" onclick="content(title = 'Penyesuaian Jurnal')"><i class="fa fa-plus"></i>
          Jurnal Penyesuaian
        </button>

        <a href="" class="btn btn-success mb-2">Export Excel</a>
        <div class="table-responsive">
          <!-- <table class="table" id="dataTable" width="" cellspacing="0"> -->
          <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="" style="font-size: small;">

            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Transaksi</th>
                <th class="text-center">No. Bukti</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Kode Akun Debit</th>
                <th class="text-center">Kode Akun Kredit</th>
                <th class="text-center">Nama Akun Debit</th>
                <th class="text-center">Didebit</th>
                <th class="text-center">Nama Akun Kredit</th>
                <th class="text-center">Dikredit</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($all as $d) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $d['tgl'] ?></td>
                  <td><?= $d['transaksi'] ?></td>
                  <td><?= $d['no_bukti'] ?></td>
                  <td><?= $d['jumlah'] ?></td>
                  <td><?= $d['kode_debit'] ?></td>
                  <td><?= $d['kode_kredit'] ?></td>
                  <td><?= $d['nama_akundebit'] ?></td>
                  <td><?= $d['didebit'] ?></td>
                  <td><?= $d['nama_akunkredit'] ?></td>
                  <td><?= $d['dikredit'] ?></td>
                  <td>
                    <a href="<?= base_url('admin/jurnalumum/form_edit/' . $d["id"] . '') ?>" class="btn btn-info">Edit</a>
                    <form action="<?= base_url('admin/jurnalumum/hapus') ?>" method="POST">
                      <input type="hidden" name="id" value="<?= $d['id'] ?>">
                      <button type="submit" class="btn btn-danger mt-1">Delete</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Modal Tambah -->
      <!-- <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTambahLabel">Form Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('jurnalumum/tambah'); ?>" method="POST">
              <div class="modal-body">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" class="form-control datepicker" data-date-format="dd-mm-yyyy" id="tanggal" name="tgl" value="<?= date('d-m-Y'); ?>" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputTf">Nama Transaksi</label>
                    <input type="text" class="form-control" id="transaksi" name="transaksi" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputBukti">No. Bukti</label>
                    <input type="text" class="form-control" id="no_bukti" name="no_bukti" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputJumlah">Jumlah</label>
                    <input type="text" class="form-control" id="inputJumlah" name="jumlah" required oninput="$('#debit').val(this.value); $('#kredit').val(this.value)">
                    <small class="form-text text-muted">*Masukkan angka saja tanpa awalan Rupiah (Rp) maupun tanda baca (.,)</small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputDebit">Kode Akun Debit</label>
                    <select name="kode_debit" id="kodeDebit" class="form-control" onchange="getAccountName('Debit', this.value)">
                      <option value="">Pilih kode akun</option>
                      <?php foreach ($account as $acc) : ?>
                        <option value="<?= $acc['kode']; ?>"><?= "K-" . $acc['kode']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputKredit">Kode Akun Kredit</label>
                    <select name="kode_kredit" id="kodeKredit" class="form-control" onchange="getAccountName('Kredit', this.value)">
                      <option value="">Pilih kode akun</option>
                      <?php foreach ($account as $acc) : ?>
                        <option value="<?= $acc['kode']; ?>"><?= "K-" . $acc['kode']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputAdebit">Nama Akun Didebit</label>
                    <input type="text" class="form-control" id="akunDebit" name="nama_akundebit" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAkredit">Nama Akun Dikredit</label>
                    <input type="text" class="form-control" id="akunKredit" name="nama_akunkredit" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputdebit">Didebit</label>
                    <input type="text" class="form-control" id="debit" name="didebit" required readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputkredit">Dikredit</label>
                    <input type="text" class="form-control" id="kredit" name="dikredit" required readonly>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
              </div>
            </form>
          </div>
        </div>
      </div> -->

      <!-- Modal Edit -->
      <!-- <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditLabel">Form Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('jurnalumum/edit'); ?>" method="POST">
              <div class="modal-body">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="tanggal2">Tanggal</label>
                    <input type="text" class="form-control datepicker" data-date-format="dd-mm-yyyy" id="tanggal2" name="tgl2" value="" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputTf">Nama Transaksi</label>
                    <input type="text" class="form-control" id="transaksi2" name="transaksi2" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputBukti">No. Bukti</label>
                    <input type="text" class="form-control" id="no_bukti2" name="no_bukti2" required readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputJumlah">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah2" name="jumlah2" required oninput="$('#debit2').val(this.value); $('#kredit2').val(this.value)">
                    <small class="form-text text-muted">*Masukkan angka saja tanpa awalan Rupiah (Rp) maupun tanda baca (.,)</small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputDebit">Kode Akun Debit</label>
                    <select name="kode_debit2" id="kodeDebit2" class="form-control" onchange="getAccountName2('Debit', this.value)">
                      <option value="">Pilih kode akun</option>
                      <?php foreach ($account as $acc) : ?>
                        <option value="<?= $acc['kode']; ?>"><?= "K-" . $acc['kode']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputKredit">Kode Akun Kredit</label>
                    <select name="kode_kredit2" id="kodeKredit2" class="form-control" onchange="getAccountName2('Kredit', this.value)">
                      <option value="">Pilih kode akun</option>
                      <?php foreach ($account as $acc) : ?>
                        <option value="<?= $acc['kode']; ?>"><?= "K-" . $acc['kode']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputAdebit">Nama Akun Didebit</label>
                    <input type="text" class="form-control" id="akunDebit2" name="nama_akundebit2" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAkredit">Nama Akun Dikredit</label>
                    <input type="text" class="form-control" id="akunKredit2" name="nama_akunkredit2" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputdebit">Didebit</label>
                    <input type="text" class="form-control" id="debit2" name="didebit2" required readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputkredit">Dikredit</label>
                    <input type="text" class="form-control" id="kredit2" name="dikredit2" required readonly>
                  </div>
                  <input type="hidden" name="id" id="id" value="" />
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Data</button>
              </div>
            </form>
          </div>
        </div>
      </div> -->


      <!-- Modal -->
      <div class="modal fade" id="jurnalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="jurnalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= base_url('admin/jurnalumum/tambah') ?>" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tgl" class="form-control" id="tanggal">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="transaksi">Transaksi</label>
                    <input type="text" name="transaksi" class="form-control" id="transaksi">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="no_bukti">No. Bukti</label>
                    <input type="text" name="no_bukti" value="<?= $no_bukti ?>" class="form-control" id="no_bukti" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" value="0" name="jumlah" class="form-control" id="jumlah">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="kode_debit">Debit</label>
                    <select name="kode_debit" id="kode_debit" class="form-control" onchange="debitChange(this)">
                      <option value="">--Pilih Debit--</option>
                      <?php foreach ($all_kas as $k) : ?>
                        <option value="<?= $k['kode'] . "-" . $k['nama'] ?>"><?= $k['kode'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="akun_debit">Akun Debit</label>
                    <input type="text" name="akun_debit" id="akun_debit" class="form-control" id="akun_debit" value="" readonly>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="kode_kredit">Kredit</label>
                    <select name="kode_kredit" id="kode_kredit" class="form-control" onchange="kreditChange(this)">
                      <option value="">--Pilih Kredit--</option>
                      <?php foreach ($all_kas as $k) : ?>
                        <option value="<?= $k['kode'] . "-" . $k['nama'] ?>"><?= $k['kode'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="akun_kredit">Akun Kredit</label>
                    <input type="text" name="akun_kredit" class="form-control" id="akun_kredit" value="" readonly>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="didebit">Didebit</label>
                    <input type="text" value="0" name="didebit" class="form-control" id="didebit">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="dikredit">DiKredit</label>
                    <input type="text" value="0" name="dikredit" class="form-control" id="dikredit">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <script>
        // const weekending = document.getElementById('weekending');
        // weekending.addEventListener("change", function() {
        //   console.log(weekending.value)
        // });

        function content(title) {
          // console.log(title);
          document.getElementById('jurnalLabel').innerHTML = title;
        }

        function debitChange(selectedObject) {
          var value = selectedObject.value;
          var updating = document.getElementById('akun_debit');
          updating.value = value.substr(6);
          // console.log(selectedObject);
        }

        function kreditChange(selectedObject) {
          var value = selectedObject.value;
          var updating = document.getElementById('akun_kredit');
          updating.value = value.substr(6);
          // console.log(selectedObject);
        }
      </script>