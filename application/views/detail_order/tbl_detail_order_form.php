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
        <h2 style="margin-top:0px">Tbl_detail_order <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Order Id <?php echo form_error('order_id') ?></label>
            <input type="text" class="form-control" name="order_id" id="order_id" placeholder="Order Id" value="<?php echo $order_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Produk <?php echo form_error('produk') ?></label>
            <input type="text" class="form-control" name="produk" id="produk" placeholder="Produk" value="<?php echo $produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Qty <?php echo form_error('qty') ?></label>
            <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_order') ?>" class="btn btn-default">Batalkan</a>
	</form>
    </body>
</html>