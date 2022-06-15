<div class="content-wrapper col-12">
<section class="content-header ml mt-2 auto">

<div style="margin-left:5px">

<div class="">
<?php if($this->session->flashdata('flash2')) :?>
<div class="row mt-3">
    <div class="col md-6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">Data Ekspedisi <strong>berhasil </strong><?= $this->session->flashdata('flash2');?>
        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    </div>    
</div>
<?php endif;?>

<?php if($this->session->flashdata('flash')) :?>
<div class="row mt-3">
    <div class="col md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">Data Ekspedisi <strong>berhasil </strong><?= $this->session->flashdata('flash');?>
        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    </div>    
</div>
<?php endif;?>
<a href="<?= base_url('admin/ekspedisi/tambah');?>" class="btn btn-info mb-2">Tambah Data</a>
<div class="table-responsive">
<table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="" style="font-size: small;">

        <thead>
            <tr style="text-align:center">
                <th style="text-align:center;width:30px">No.</th>
                <th>Kode</th>
                <th>Nama Ekspedisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            <?php foreach ($daftarekspedisi as $daf): ?>
            <tr>
                <td width="">
                    <?php echo $i;?>
                </td>
                <td>
                    <?php echo $daf['kode'] ?>
                </td>
                <td>
                    <?php echo $daf['nama'] ?>
                </td>
                
                <td style="text-align:center;">

                    <a href="<?php echo base_url();?>admin/ekspedisi/edit/<?= $daf['id'];?>" class="btn btn-success"><i class="fa fa-edit"></i>Edit</i></a>
                    <a href="<?= base_url();?>ekspedisi/hapus/<?= $daf['id'];?>" class="btn btn-danger"  onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i>Hapus</a>

                </td>
            </tr>
            <?php $i++;?>
            <?php endforeach; ?>

        </tbody>
    </table>
    </div>
</div>