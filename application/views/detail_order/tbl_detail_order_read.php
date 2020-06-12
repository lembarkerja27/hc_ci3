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
        <h2 style="margin-top:0px">Tbl_detail_order Read</h2>
        <table class="table">
	    <tr><td>Order Id</td><td><?php echo $order_id; ?></td></tr>
	    <tr><td>Produk</td><td><?php echo $produk; ?></td></tr>
	    <tr><td>Qty</td><td><?php echo $qty; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail_order') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>