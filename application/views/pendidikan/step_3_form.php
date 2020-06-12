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
        <h2 style="margin-top:0px">Step_3 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nm Sekolah <?php echo form_error('nm_sekolah') ?></label>
            <input type="text" class="form-control" name="nm_sekolah" id="nm_sekolah" placeholder="Nm Sekolah" value="<?php echo $nm_sekolah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ProgStudi <?php echo form_error('progStudi') ?></label>
            <input type="text" class="form-control" name="progStudi" id="progStudi" placeholder="ProgStudi" value="<?php echo $progStudi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">ThnLulus <?php echo form_error('thnLulus') ?></label>
            <input type="text" class="form-control" name="thnLulus" id="thnLulus" placeholder="ThnLulus" value="<?php echo $thnLulus; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NoIjazah <?php echo form_error('noIjazah') ?></label>
            <input type="text" class="form-control" name="noIjazah" id="noIjazah" placeholder="NoIjazah" value="<?php echo $noIjazah; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Jenjang <?php echo form_error('jenjang') ?></label>
            <input type="text" class="form-control" name="jenjang" id="jenjang" placeholder="Jenjang" value="<?php echo $jenjang; ?>" />
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
            <label for="varchar">Up FcIjazahLegalisir <?php echo form_error('Up_fcIjazahLegalisir') ?></label>
            <input type="text" class="form-control" name="Up_fcIjazahLegalisir" id="Up_fcIjazahLegalisir" placeholder="Up FcIjazahLegalisir" value="<?php echo $Up_fcIjazahLegalisir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Up DtPendidikan <?php echo form_error('Up_dtPendidikan') ?></label>
            <input type="text" class="form-control" name="Up_dtPendidikan" id="Up_dtPendidikan" placeholder="Up DtPendidikan" value="<?php echo $Up_dtPendidikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Up SuratKeterangan <?php echo form_error('Up_suratKeterangan') ?></label>
            <input type="text" class="form-control" name="Up_suratKeterangan" id="Up_suratKeterangan" placeholder="Up SuratKeterangan" value="<?php echo $Up_suratKeterangan; ?>" />
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
	    <input type="hidden" name="kd_step3" value="<?php echo $kd_step3; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendidikan') ?>" class="btn btn-default">Batalkan</a>
	</form>
    </body>
</html>