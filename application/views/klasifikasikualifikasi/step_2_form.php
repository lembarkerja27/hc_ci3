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
        <h2 style="margin-top:0px">Step_2 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="datetime">TglPemohon <?php echo form_error('tglPemohon') ?></label>
            <input type="text" class="form-control" name="tglPemohon" id="tglPemohon" placeholder="TglPemohon" value="<?php echo $tglPemohon; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bidang <?php echo form_error('Bidang') ?></label>
            <input type="text" class="form-control" name="Bidang" id="Bidang" placeholder="Bidang" value="<?php echo $Bidang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NoRegisterAssoc <?php echo form_error('noRegisterAssoc') ?></label>
            <input type="text" class="form-control" name="noRegisterAssoc" id="noRegisterAssoc" placeholder="NoRegisterAssoc" value="<?php echo $noRegisterAssoc; ?>" />
        </div>
	    <div class="form-group">
            <label for="tempat_upstk">Tempat Upstk <?php echo form_error('tempat_upstk') ?></label>
            <textarea class="form-control" rows="3" name="tempat_upstk" id="tempat_upstk" placeholder="Tempat Upstk"><?php echo $tempat_upstk; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Kualifikasi <?php echo form_error('kualifikasi') ?></label>
            <input type="text" class="form-control" name="kualifikasi" id="kualifikasi" placeholder="Kualifikasi" value="<?php echo $kualifikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">SubBidang <?php echo form_error('subBidang') ?></label>
            <input type="text" class="form-control" name="subBidang" id="subBidang" placeholder="SubBidang" value="<?php echo $subBidang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Permohonan <?php echo form_error('jenis_permohonan') ?></label>
            <input type="text" class="form-control" name="jenis_permohonan" id="jenis_permohonan" placeholder="Jenis Permohonan" value="<?php echo $jenis_permohonan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Up BeritaAcara <?php echo form_error('Up_beritaAcara') ?></label>
            <input type="text" class="form-control" name="Up_beritaAcara" id="Up_beritaAcara" placeholder="Up BeritaAcara" value="<?php echo $Up_beritaAcara; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Up SuratPengantar <?php echo form_error('Up_suratPengantar') ?></label>
            <input type="text" class="form-control" name="Up_suratPengantar" id="Up_suratPengantar" placeholder="Up SuratPengantar" value="<?php echo $Up_suratPengantar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Up PenilaianMandiri <?php echo form_error('Up_penilaianMandiri') ?></label>
            <input type="text" class="form-control" name="Up_penilaianMandiri" id="Up_penilaianMandiri" placeholder="Up PenilaianMandiri" value="<?php echo $Up_penilaianMandiri; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Up SuratPermohonan <?php echo form_error('Up_suratPermohonan') ?></label>
            <input type="text" class="form-control" name="Up_suratPermohonan" id="Up_suratPermohonan" placeholder="Up SuratPermohonan" value="<?php echo $Up_suratPermohonan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Up FcSertifikatKeahlian <?php echo form_error('Up_fcSertifikatKeahlian') ?></label>
            <input type="text" class="form-control" name="Up_fcSertifikatKeahlian" id="Up_fcSertifikatKeahlian" placeholder="Up FcSertifikatKeahlian" value="<?php echo $Up_fcSertifikatKeahlian; ?>" />
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
	    <input type="hidden" name="kd_step2" value="<?php echo $kd_step2; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('klasifikasikualifikasi') ?>" class="btn btn-default">Batalkan</a>
	</form>
    </body>
</html>