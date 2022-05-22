<?php 

$value="FirdySoft Creation Inc.Bontang Kalimantan Timur 
Mobile: 0821-81000168 
WhatsApp: 0821-81000168
";

?>
<div class="container">
        <div class="col-md-6">
            <h2 class="">Back Up Database</h2>
            <form action="" class="form-horizontal" method="">
            <input type="hidden" name="id" class="form-control" value="">
            <div class="form-row">
                <label for="inputNama">Backup Database</label>
                <a href="<?= base_url();?>backup/backupdb"><i class="fa fa-database"></i><span>Backup Database</span></a>
            </div>

            
                
                
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                <a href="<?=base_url('dashboard');?>" class="btn btn-success mb-2">Kembali</a>
            </form>
        </div>
</div>