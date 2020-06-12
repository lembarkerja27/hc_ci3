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
        <h2 style="margin-top:0px">Sub_skt_terampil <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">KDTK <?php echo form_error('KDTK') ?></label>
            <input type="text" class="form-control" name="KDTK" id="KDTK" placeholder="KDTK" value="<?php echo $KDTK; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Klasifikasi <?php echo form_error('nama_klasifikasi') ?></label>
            <input type="text" class="form-control" name="nama_klasifikasi" id="nama_klasifikasi" placeholder="Nama Klasifikasi" value="<?php echo $nama_klasifikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KodeSkt <?php echo form_error('kodeSkt') ?></label>
            <input type="text" class="form-control" name="kodeSkt" id="kodeSkt" placeholder="KodeSkt" value="<?php echo $kodeSkt; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('subterampil') ?>" class="btn btn-default">Batalkan</a>
	</form>
    </body>
</html>