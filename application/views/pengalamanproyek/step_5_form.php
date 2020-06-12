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
        <h2 style="margin-top:0px">Step_5 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nm Proyek <?php echo form_error('nm_proyek') ?></label>
            <input type="text" class="form-control" name="nm_proyek" id="nm_proyek" placeholder="Nm Proyek" value="<?php echo $nm_proyek; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">TanggalMulai <?php echo form_error('tanggalMulai') ?></label>
            <input type="text" class="form-control" name="tanggalMulai" id="tanggalMulai" placeholder="TanggalMulai" value="<?php echo $tanggalMulai; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">TanggalAkhir <?php echo form_error('tanggalAkhir') ?></label>
            <input type="text" class="form-control" name="tanggalAkhir" id="tanggalAkhir" placeholder="TanggalAkhir" value="<?php echo $tanggalAkhir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi Proyek <?php echo form_error('lokasi_proyek') ?></label>
            <input type="text" class="form-control" name="lokasi_proyek" id="lokasi_proyek" placeholder="Lokasi Proyek" value="<?php echo $lokasi_proyek; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nilai Proyek <?php echo form_error('nilai_proyek') ?></label>
            <input type="text" class="form-control" name="nilai_proyek" id="nilai_proyek" placeholder="Nilai Proyek" value="<?php echo $nilai_proyek; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Up PersyaratanPengalamanProyek <?php echo form_error('Up_persyaratanPengalamanProyek') ?></label>
            <input type="text" class="form-control" name="Up_persyaratanPengalamanProyek" id="Up_persyaratanPengalamanProyek" placeholder="Up PersyaratanPengalamanProyek" value="<?php echo $Up_persyaratanPengalamanProyek; ?>" />
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
	    <input type="hidden" name="kd_step5" value="<?php echo $kd_step5; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengalamanproyek') ?>" class="btn btn-default">Batalkan</a>
	</form>
    </body>
</html>