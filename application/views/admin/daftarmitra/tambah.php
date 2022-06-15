<div class="container">
    <div class="col-md-6">
        <!-- <h5>Tambah Form Data</h5> -->

        <!-- <form action="" method="POST">  -->
        <form action="<?= base_url() ?>admin/daftar_mitra/tambah" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="kode">ID</label>
                <input type="text" class="form-control" id="kode" name="kode" value="MT-<?php echo sprintf("%04s", $kode) ?>" readonly>

                <!-- <input type="text" class="form-control" id="inputKode" name="kode" required> -->
                </div>
                <div class="form-group col-md-6">
                <label for="inputNama">Nama</label>
                <input type="text" class="form-control" id="inputNama" name="name" required>
                </div>
            </div>
            <div class="form-row">
                
                <div class="form-group col-md-4">
                <label for="inputTgl">Tgl Lahir</label>
                <input type="date" class="form-control" id="inputTgl" name="tgl_lahir" required>
                </div>
                <div class="form-group col-md-4">
                 <label for="jabatan">Jabatan</label>
                 <select class="form-control" name="jabatan" id="jabatan">
                 <option value="">-- Pilih --</option>
                 <?php foreach ($jabatan as $j) :?>
                    <option name="jabatan"><?= $j['name'];?></option>
                <?php endforeach;?>
                </select>
             </div>
                <div class="form-group col-md-4">
                <label for="inputPromoter">Promoter</label>
                 <input type="text" name="promoter" id="promoter" class="form-control" data-toggle="modal" data-target="#myModal" placeholder="Pilih Promotor">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputTahun">Tahun Gabung</label>
                <input type="text" class="form-control" id="inputTahun" name="thn_gabung" required>
                </div>
                <div class="form-group col-md-6">
                <label for="gudang">Gudang</label>
                 <select class="form-control" name="gudang" id="gudang">
                 <option value="">-- Pilih --</option>
                 <?php foreach ($gudang as $j) :?>
                    <option name="gudang"><?= $j['nama'];?></option>
                <?php endforeach;?>
                </select>
                </div>
            </div>
                <div class="form-group">
                <label for="inputAlamat">Alamat</label>
                <input type="text" class="form-control" id="inputAlamat" name="alamat" required>
                </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputKota">Kota</label>
                <input type="text" class="form-control" id="inputKota" name="kota" required>
                </div>
                <div class="form-group col-md-6">
                <label for="inputTelepon">Telepon</label>
                <input type="text" class="form-control" id="inputTelepon" name="telepon" required>
                </div>
            </div>
                <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" id="inputEmail" name="email" required>
                </div>
          

            <button type="submit" class="btn btn-primary">Tambah Data</button>
            <a href="<?= base_url('admin/daftar_mitra');?>" class="btn btn-success">Kembali</a>
            </form>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <table id="lookup" class="table-responsive table table-hover" cellspacing="2" width="" style="font-size: small;">
                        <thead>
                            <tr>
                                <th>No.</th>
                               <th>ID Mitra</th>
                               <th>Nama</th>
                               <th>Jabatan</th>
                           </tr>
                       </thead>
                       <tbody>
                            <?php
                            $no = 1;
                            if ($databrg != null):         
                            foreach($databrg as $i):
                            $kode=$i['kode'];
                            $name=$i['name'];
                            $jabatan=$i['jabatan'];
                            ?>
                            <tr class="pilih" data-nama="<?php echo $name; ?>">
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?php echo $kode ?>
                                </td>
                                <td width="">
                                    <?php echo $name ?>
                                </td>
                                <td width="">
                                    <?php echo $jabatan ?>
                                </td>
                            </tr>
                            <?php endforeach; endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

    $('.pilih').on('click', function() {
        $('#promoter').val($(this).attr('data-nama'));
        $('#myModal').modal('hide');
    });
    
    // jika dipilih, nim akan masuk ke input dan modal di tutup
    $(document).on('click', '.pilih', function (e) {
        document.getElementById("nama").value = $(this).attr('data-nama');
        $('#myModal').modal('hide');
    });


    </script>
</div>