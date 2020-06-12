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
        <h2 style="margin-top:0px">Step_2 Read</h2>
        <table class="table">
	    <tr><td>TglPemohon</td><td><?php echo $tglPemohon; ?></td></tr>
	    <tr><td>Bidang</td><td><?php echo $Bidang; ?></td></tr>
	    <tr><td>NoRegisterAssoc</td><td><?php echo $noRegisterAssoc; ?></td></tr>
	    <tr><td>Tempat Upstk</td><td><?php echo $tempat_upstk; ?></td></tr>
	    <tr><td>Kualifikasi</td><td><?php echo $kualifikasi; ?></td></tr>
	    <tr><td>SubBidang</td><td><?php echo $subBidang; ?></td></tr>
	    <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
	    <tr><td>Jenis Permohonan</td><td><?php echo $jenis_permohonan; ?></td></tr>
	    <tr><td>Up BeritaAcara</td><td><?php echo $Up_beritaAcara; ?></td></tr>
	    <tr><td>Up SuratPengantar</td><td><?php echo $Up_suratPengantar; ?></td></tr>
	    <tr><td>Up PenilaianMandiri</td><td><?php echo $Up_penilaianMandiri; ?></td></tr>
	    <tr><td>Up SuratPermohonan</td><td><?php echo $Up_suratPermohonan; ?></td></tr>
	    <tr><td>Up FcSertifikatKeahlian</td><td><?php echo $Up_fcSertifikatKeahlian; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Program Name</td><td><?php echo $program_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('klasifikasikualifikasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>