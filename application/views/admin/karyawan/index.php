<div class="content-wrapper col-12">
<section class="content-header ml my-2 auto">


<div style="margin-left:5px">

<div class="">
<?php if($this->session->flashdata('flash2')) :?>
<div class="row mt-3">
    <div class="col md-6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">Data Karyawan <strong>berhasil </strong><?= $this->session->flashdata('flash2');?>
        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    </div>    
</div>
<?php endif;?>

<?php if($this->session->flashdata('flash')) :?>
<div class="row mt-3">
    <div class="col md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">Data Karyawan <strong>berhasil </strong><?= $this->session->flashdata('flash');?>
        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    </div>    
</div>
<?php endif;?>

<a href="<?= base_url('admin/karyawan/tambah');?>" class="btn btn-primary mb-2 mt-2">Tambah Data</a>
<div class="table-responsive pt-2 pr-2">

<table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="" style="font-size: 12px;">

        <thead>
            <tr style="text-align: center;">
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Tgl_lahir</th>
                <th>Jabatan</th>
                <th>Thn Gabung</th>
                <th>Alamat</th>
                <th>Kota/Kec</th>
                <th>No. Hp</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="show_data">
            <?php $i=1;?>
            <?php foreach ($karyawan as $erp): ?>
            <tr>
                <td width="">
                    <?php echo $i;?>
                </td>
                <td>
                    <?php echo $erp['kode'] ?>
                </td>
                <td width="">
                    <?php echo $erp['nama'] ?>
                </td>
                <td>
                <?php echo $erp['tgl_lahir'] ?>
                </td>
                <td>
                    <?php echo $erp['jabatan'] ?>
                </td>
                <td>
                    <?php echo $erp['thn_gabung'] ?>
                </td>
                <td class="">
                    <?php echo $erp['alamat']?>
                </td>
                <td class="">
                    <?php echo $erp['kota']?>
                </td>
                <td class="">
                    <?php echo $erp['no_telp']?>
                </td>
                <td class="">
                    <?php echo $erp['email']?>
                </td>
                <td>
                
                <div class="btn-group" >
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu">
                    <a href="<?= base_url();?>admin/karyawan/edit/<?= $erp['id'];?>" class="btn btn-success" style="margin-left:42px"><i class="fa fa-edit"></i>Edit</i></a>
                    <a href="<?= base_url();?>admin/karyawan/hapus/<?= $erp['id'];?>" class="btn btn-danger mt-2" style="margin-left:35px" onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i>Hapus</a>
                    </div>
                </div>
                </td>
            </tr>
            <?php $i++;?>
            <?php endforeach; ?>

        </tbody>
    </table>
    </div>
</div>

<script>
    $('#mytable').dataTable({
        language: {
            search: "",
            searchPlaceholder: "Cari data karyawan.."
        },
        bInfo: false
    });
</script>