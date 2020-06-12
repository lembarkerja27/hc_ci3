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
        <h2 style="margin-top:0px">Sub_skt_terampil Read</h2>
        <table class="table">
	    <tr><td>KDTK</td><td><?php echo $KDTK; ?></td></tr>
	    <tr><td>Nama Klasifikasi</td><td><?php echo $nama_klasifikasi; ?></td></tr>
	    <tr><td>KodeSkt</td><td><?php echo $kodeSkt; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('subterampil') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>