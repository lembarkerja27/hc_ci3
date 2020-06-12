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
        <h2 style="margin-top:0px">Step_4 Read</h2>
        <table class="table">
	    <tr><td>Nm Penyelenggara</td><td><?php echo $nm_penyelenggara; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>NoSertifikat</td><td><?php echo $noSertifikat; ?></td></tr>
	    <tr><td>Nm Kursus</td><td><?php echo $nm_kursus; ?></td></tr>
	    <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Up PersyartanKursus</td><td><?php echo $Up_persyartanKursus; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Program Name</td><td><?php echo $program_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kursus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>