<div class="content-wrapper col-12">
<section class="content-header ml mt-2 auto">


<div style="margin-left:5px">
<div class="">
<?php if($this->session->flashdata('flash2')) :?>
<div class="row mt-3">
    <div class="col md-6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">Data Mitra <strong>berhasil </strong><?= $this->session->flashdata('flash2');?>
        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    </div>    
</div>
<?php endif;?>

<?php if($this->session->flashdata('flash')) :?>
<div class="row mt-3">
    <div class="col md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">Data Mitra <strong>berhasil </strong><?= $this->session->flashdata('flash');?>
        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    </div>    
</div>

<div class="row mt-3">
    <div class="col md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">Profil <strong>Perusahaan </strong>
        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    </div>    
</div>
<?php endif;?>

</div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
                <!-- Page Heading -->
          <div class="bg-primary" style="border-radius:5px;">
          <h1 class="h3 text-light center" style="text-align:center;">Profil Perusahan</h1>
          
            <?= $this->session->flashdata('message');?>
            <form action="<?= base_url('users/changepassword');?>" method="post"> 
              <div class="form-group mr-3">
                <label for="nama_perusahaan" class="text-light ml-2">Nama Perusahaan</label>
                <input type="text" class="form-control ml-2" name="nama_perusahaan" id="nama_perusahaan">
                <?= form_error('nama_perusahaan','<small class="text-danger pl-3">','</small>');?>
              </div>
               <div class="form-group mr-3">
                <label for="alamat" class="text-light ml-2">Alamat</label>
                <input type="text" class="form-control ml-2" name="alamat" id="alamat">
                <?= form_error('alamat','<small class="text-danger pl-3">','</small>');?>
              </div>
              <div class="form-group mr-3">
               <label for="kota" class="text-light ml-2">Kota</label>
                <input type="text" class="form-control ml-2" name="kota" id="kota">
                <?= form_error('kota','<small class="text-danger pl-3">','</small>');?>
              </div>
                <div class="form-group mr-3">
               <label for="telpon" class="text-light ml-2">Telpon</label>
                <input type="text" class="form-control ml-2" name="telpon" id="telpon">
                <?= form_error('telpon','<small class="text-danger pl-3">','</small>');?>
              </div>
                <div class="form-group mr-3">
               <label for="website" class="text-light ml-2">Website</label>
                <input type="text" class="form-control ml-2" name="website" id="website">
                <?= form_error('website','<small class="text-danger pl-3">','</small>');?>
              </div>
              <div class="form-group mt-3" align="right" style="margin-right:10px ;">
                <button type="submit" class="btn btn-info mb-2 ml-2" disabled>Simpan</button>
              </div>
            </form>
            </div>
            </div>
        </div>
</div>
</section>
</div>



