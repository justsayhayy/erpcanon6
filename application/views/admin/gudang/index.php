<div class="content-wrapper col-12">
<section class="content-header ml mt-2 auto">  

</ol>
<div style="margin-left:5px">

<div class="">
<?php if($this->session->flashdata('flash2')) :?>
<div class="row mt-3">
    <div class="col md-6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">Data Gudang <strong>berhasil </strong><?= $this->session->flashdata('flash2');?>
        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    </div>    
</div>
<?php endif;?>

<?php if($this->session->flashdata('flash')) :?>
<div class="row mt-3">
    <div class="col md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">Data Gudang <strong>berhasil </strong><?= $this->session->flashdata('flash');?>
        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    </div>    
</div>
<?php endif;?>
<div class="row mt-3">
        <div class="col-lg-8 mb-2">

        <div class="row mt-3">
             <div class="col-md-6">
                <form action="" method="post">
                <div class="input-group">
                <input type="text" name="keyword" id="keyword" placeholder="Cari Data Gudang..." class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
                </div>
                </form>
                </div>
            </div>
               
        </div>
            
        </div>

</div><br/>
<a href="<?= base_url('admin/gudang/tambah');?>" class="btn btn-info mb-2">Tambah Data</a>

<div class="table-responsive">

<table id="dataTable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="" style="font-size: small;">

        <thead>
            <tr style="text-align:center">
                <th>No.</th>
                <th>Kode</th>
                <th>Nama Gudang</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            <?php foreach ($gudang as $erp): ?>
            <tr>
                <td style="text-align:center">
                    <?php echo $i;?>
                </td>
                <td>
                    <?php echo $erp['kode'] ?>
                </td>
                <td width="">
                    <?php echo $erp['nama'] ?>
                </td>
                <td width="">
                    <?php echo $erp['alamat'] ?>
                </td>
                
                <td style="text-align:center">
                
                    <a href="<?= base_url();?>admin/gudang/edit/<?= $erp['id'];?>" class="btn btn-success" style=""><i class="fa fa-edit"></i>Edit</a>
                    <a href="<?= base_url();?>admin/gudang/hapus/<?= $erp['id'];?>" class="btn btn-danger" style="" onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i>Hapus</a>
                    
                </td>
            </tr>
            <?php $i++;?>
            <?php endforeach; ?>

        </tbody>
    </table>
    </div>
</div>