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
        <h2 style="margin-top:0px">Skt_terampil <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Skt <?php echo form_error('kode_skt') ?></label>
            <input type="text" class="form-control" name="kode_skt" id="kode_skt" placeholder="Kode Skt" value="<?php echo $kode_skt; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Klasifikasi <?php echo form_error('nama_klasifikasi') ?></label>
            <input type="text" class="form-control" name="nama_klasifikasi" id="nama_klasifikasi" placeholder="Nama Klasifikasi" value="<?php echo $nama_klasifikasi; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('terampil') ?>" class="btn btn-default">Batalkan</a>
	</form>
    </body>
</html>