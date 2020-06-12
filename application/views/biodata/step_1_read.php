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
        <h2 style="margin-top:0px">Step_1 Read</h2>
        <table class="table">
	    <tr><td>Ktp</td><td><?php echo $ktp; ?></td></tr>
	    <tr><td>NamaTnpGlr</td><td><?php echo $namaTnpGlr; ?></td></tr>
	    <tr><td>NamaSertifikat</td><td><?php echo $namaSertifikat; ?></td></tr>
	    <tr><td>Npwp</td><td><?php echo $npwp; ?></td></tr>
	    <tr><td>TmpLahir</td><td><?php echo $tmpLahir; ?></td></tr>
	    <tr><td>TglLahir</td><td><?php echo $tglLahir; ?></td></tr>
	    <tr><td>NoTelp</td><td><?php echo $NoTelp; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Jekel</td><td><?php echo $jekel; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Program Name</td><td><?php echo $program_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('biodata') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>