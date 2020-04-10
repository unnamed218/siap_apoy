<html>
	<head>
	</head>
	<body>
	<!-- <center><h3><b>Pembelian</b></h3></center>
	 -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Pembelian</b></h3>
  </div>
  	 <div class="x_content">
  	 	<?php if(!empty($_POST['no_supplier'])){?>
		<form method = "POST" action = "<?php echo site_url('c_transaksi/selesai');?>">
			
			<div class="row">
				<div class="col col-sm-6">
			<div class="form-group">
			  <label>No Transaksi</label>
			  <input type = "text" name = "no_transaksi" class = "form-control" value = "<?php echo $no_transaksi;?>" readonly>
			</div>
		</div>
		<div class="col col-sm-6">
			<div class="form-group">
			  <label>No Lot</label>
			  <input type = "text" name = "no_lot" class = "form-control" value="<?php echo $no_lot;?>" readonly>
			</div>
			
			</div>
		</div>
			<div class="form-group">
			  <label>Tgl Transaksi</label>
			  <input type = "text" class = "form-control"  value = "<?php echo date('y-m-d');?>" readonly>
			</div>
			<div class="row">
				<div class="col col-sm-4">
			<div class="form-group">
			  <label>Nama Bahan Baku</label>
			  <select name = "no_bb" class = "form-control" readonly>
				<?php
					foreach($abc as $data){
						echo "<option readonly value = ".$data['no_bb'].">".$data['nama_bb']."</option>";
					}
				?>
			  </select>
			</div>
		</div>
		<div class="col col-sm-4">
			<div class="form-group">
			  <label>Harga Satuan</label>
			  <input type = "text" name = "harga_satuan" class = "form-control" value="<?php echo format_rp($data['harga']);?>" readonly>
			</div>
		</div>
		<div class="col col-sm-4">
			<div class="form-group">
			  <label>Jumlah</label>
			  <input type = "text" name = "jumlah" class = "form-control" value="<?php echo $data['hasil_lot'];?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col col-sm-12">
			<div class="form-group">
				<label>Nama Supplier</label>
				 <input type = "text" name = "no_supplier" value="<?php echo $result['no_supplier'];?>" readonly hidden>
			  <input type = "text" class = "form-control" value="<?php echo $result['nama_supplier'];?>" readonly>
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col col-sm-4">
			<div class="form-group">
				<label>Subtotal</label>
				<input type="text" readonly  value="<?php echo format_rp($subtotal);?>" class="form-control">
				<input type="hidden" readonly name="subtotal" value="<?php echo $subtotal;?>" class="form-control">
			</div>
		</div>
		<?php $diskon1 = $subtotal * $diskon / 100;
			  $total = $subtotal - $diskon1 + 20000;
			  $total1 = $subtotal - $diskon1;
		?>
		<div class="col col-sm-4">
			<div class="form-group">
				<label>Diskon (%)</label>
				<input type="text" class="form-control" value="<?php echo format_rp($diskon1);?>" readonly>
				 <input type="hidden" class="form-control" name="diskon" value="<?php echo $diskon1?>" readonly>
			</div>
		</div>
		<div class="col col-sm-4">
			<div class="form-group">
				<label>Total</label>
				<input type="text" class="form-control"  value="<?php echo format_rp($total) ?>" readonly>
				<input type="hidden" class="form-control" name="total" value="<?php echo $total1 ?>" readonly       >

			</div>

		</div>
	</div>

			<button type="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-default" href="<?php echo site_url('c_transaksi/form_pemb1');?>">Back</a>
		</form>
	*Total sudah termasuk biaya pesan (Rp. 20.000,-)
		<?php }else{?>
			<div class='alert alert-danger'>
				<li>
			<label>No Supplier belum diisi, pilih 	<a href="<?php echo site_url('c_transaksi/form_pemb1');?>">Kembali</a></label>
		</li>
		</div>
		<?php } ?>
	</body>
</html>