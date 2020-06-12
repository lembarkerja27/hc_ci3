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
        <h2 style="margin-top:0px">Step_1 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Ktp <?php echo form_error('ktp') ?></label>
            <input type="text" class="form-control" name="ktp" id="ktp" placeholder="Ktp" value="<?php echo $ktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NamaTnpGlr <?php echo form_error('namaTnpGlr') ?></label>
            <input type="text" class="form-control" name="namaTnpGlr" id="namaTnpGlr" placeholder="NamaTnpGlr" value="<?php echo $namaTnpGlr; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NamaSertifikat <?php echo form_error('namaSertifikat') ?></label>
            <input type="text" class="form-control" name="namaSertifikat" id="namaSertifikat" placeholder="NamaSertifikat" value="<?php echo $namaSertifikat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Npwp <?php echo form_error('npwp') ?></label>
            <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Npwp" value="<?php echo $npwp; ?>" />
        </div>
	    <div class="form-group">
            <label for="tmpLahir">TmpLahir <?php echo form_error('tmpLahir') ?></label>
            <textarea class="form-control" rows="3" name="tmpLahir" id="tmpLahir" placeholder="TmpLahir"><?php echo $tmpLahir; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="date">TglLahir <?php echo form_error('tglLahir') ?></label>
            <input type="text" class="form-control" name="tglLahir" id="tglLahir" placeholder="TglLahir" value="<?php echo $tglLahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NoTelp <?php echo form_error('NoTelp') ?></label>
            <input type="text" class="form-control" name="NoTelp" id="NoTelp" placeholder="NoTelp" value="<?php echo $NoTelp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jekel <?php echo form_error('jekel') ?></label>
            <input type="text" class="form-control" name="jekel" id="jekel" placeholder="Jekel" value="<?php echo $jekel; ?>" />
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
	    <input type="hidden" name="kd_step1" value="<?php echo $kd_step1; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('biodata') ?>" class="btn btn-default">Batalkan</a>
	</form>
    </body>
</html>