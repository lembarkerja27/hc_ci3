<!doctype html>
<html>
    <head>
        <title>HC</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Step_6 Read</h2>
        <table class="table">
	    <tr><td>Nm Instansi</td><td><?php echo $nm_instansi; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>TanggalMulai</td><td><?php echo $tanggalMulai; ?></td></tr>
	    <tr><td>TanggalAkhir</td><td><?php echo $tanggalAkhir; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Desk Pekerjaan</td><td><?php echo $desk_pekerjaan; ?></td></tr>
	    <tr><td>Jenis Instansi</td><td><?php echo $jenis_instansi; ?></td></tr>
	    <tr><td>Up PersratanPengalamanOrganisasi</td><td><?php echo $Up_persratanPengalamanOrganisasi; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Program Name</td><td><?php echo $program_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengalamanorganisasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>