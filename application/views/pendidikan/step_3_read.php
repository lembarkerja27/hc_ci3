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
        <h2 style="margin-top:0px">Step_3 Read</h2>
        <table class="table">
	    <tr><td>Nm Sekolah</td><td><?php echo $nm_sekolah; ?></td></tr>
	    <tr><td>ProgStudi</td><td><?php echo $progStudi; ?></td></tr>
	    <tr><td>ThnLulus</td><td><?php echo $thnLulus; ?></td></tr>
	    <tr><td>NoIjazah</td><td><?php echo $noIjazah; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Jenjang</td><td><?php echo $jenjang; ?></td></tr>
	    <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Up FcIjazahLegalisir</td><td><?php echo $Up_fcIjazahLegalisir; ?></td></tr>
	    <tr><td>Up DtPendidikan</td><td><?php echo $Up_dtPendidikan; ?></td></tr>
	    <tr><td>Up SuratKeterangan</td><td><?php echo $Up_suratKeterangan; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Program Name</td><td><?php echo $program_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pendidikan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>