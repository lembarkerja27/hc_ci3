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
        <h2 style="margin-top:0px">Skt_terampil Read</h2>
        <table class="table">
	    <tr><td>Kode Skt</td><td><?php echo $kode_skt; ?></td></tr>
	    <tr><td>Nama Klasifikasi</td><td><?php echo $nama_klasifikasi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('terampil') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>