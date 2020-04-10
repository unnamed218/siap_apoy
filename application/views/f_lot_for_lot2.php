<html>
	<head>
	</head>
	<body>
	<!-- <center><h3><b>Lot For Lot</b></h3></center>
	 -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Lot For Lot</b></h3>
  </div>
  	 <div class="x_content">
  	 	<?php if($nilai <= $kapasitas_gudang){?>
		<form method = "POST" action = "<?php echo site_url('c_transaksi/tambah3');?>">
			<div class="row">
				<div class="col col-sm-6">
			<div class="form-group">
			  <label>ID Lot For Lot</label>
			 <input type="text" name="no_lot" class="form-control" value="<?php echo $no_trans?>" readonly>
			</div>
		</div>
		<div class="col col-sm-6">
			<div class="form-group">
			  <label>ID Target Proyeksi</label>
			 <input type="text" name="no_target" class="form-control" value="<?php echo $no_target['no_target']?>" readonly>
			</div>
		</div>
	</div>
		<div class="row">
			<div class="col-sm-12">
			<div class="form-group">
			  <label>Jumlah Target Proyeksi</label>
			 <input type="text" class="form-control" value="<?php echo $no_target['jumlah']?>" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col-sm-6">
			<div class="form-group">
			  <label>Permintaan Lot For Lot</label>
			 <input type="text" name="jumlah_lot" class="form-control" value="<?php echo $demand?>" readonly>
			</div>
		</div>
		<div class="col col-sm-6">
			<div class="form-group">
			  <label>Hasil Lot</label>
			 <input type="text" name="hasil_lot" class="form-control" value="<?php echo $nilai?>" readonly>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="col col-sm-12">
				<div class="form-group">
					<label>Total Biaya (belum termasuk diskon)</label>
					<input type="text"  class="form-control" value="<?php echo format_rp($totalbiaya);?>" readonly>
					<input type="hidden" name="total_biaya" class="form-control" value="<?php echo $totalbiaya;?>" readonly>
				</div>
			</div>
		</div>
			
			<button type="submit" class="btn btn-default btn-primary">Simpan</button>
			<a type="button" class="btn btn-default" href="<?php echo site_url('c_transaksi/form_lot_for_lot');?>">Kembali</a>
		</form>
		<?php 

			}
			else{
		?>
		<div class='alert alert-danger'>
		<center>		
		<label>Hasil Lot melebihi Kapasitas Gudang, Pilih 	<a href="<?php echo site_url('c_transaksi/form_lot_for_lot');?>">Kembali</a></label>
	</center>
		</div>
		<?php 
	}
		?>
		
	</body>
</html>