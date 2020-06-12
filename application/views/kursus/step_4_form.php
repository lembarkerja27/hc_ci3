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
        <h2 style="margin-top:0px">Step_4 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nm Penyelenggara <?php echo form_error('nm_penyelenggara') ?></label>
            <input type="text" class="form-control" name="nm_penyelenggara" id="nm_penyelenggara" placeholder="Nm Penyelenggara" value="<?php echo $nm_penyelenggara; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="date">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NoSertifikat <?php echo form_error('noSertifikat') ?></label>
            <input type="text" class="form-control" name="noSertifikat" id="noSertifikat" placeholder="NoSertifikat" value="<?php echo $noSertifikat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Kursus <?php echo form_error('nm_kursus') ?></label>
            <input type="text" class="form-control" name="nm_kursus" id="nm_kursus" placeholder="Nm Kursus" value="<?php echo $nm_kursus; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Up PersyartanKursus <?php echo form_error('Up_persyartanKursus') ?></label>
            <input type="text" class="form-control" name="Up_persyartanKursus" id="Up_persyartanKursus" placeholder="Up PersyartanKursus" value="<?php echo $Up_persyartanKursus; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Created By <?php echo form_error('created_by') ?></label>
            <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Created Date <?php echo form_error('created_date') ?></label>
            <input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Updated By <?php echo form_error('updated_by') ?></label>
            <input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $updated_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Updated Date <?php echo form_error('updated_date') ?></label>
            <input type="text" class="form-control" name="updated_date" id="updated_date" placeholder="Updated Date" value="<?php echo $updated_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Program Name <?php echo form_error('program_name') ?></label>
            <input type="text" class="form-control" name="program_name" id="program_name" placeholder="Program Name" value="<?php echo $program_name; ?>" />
        </div>
	    <input type="hidden" name="kd_step4" value="<?php echo $kd_step4; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kursus') ?>" class="btn btn-default">Batalkan</a>
	</form>
    </body>
</html>