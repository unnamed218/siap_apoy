<html>
	<head>
		<title>Lot For Lot</title>
	</head>
	<!-- <center><h3><b>Lot For Lot</h3></b></center>
	 -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Lot For Lot</b></h3>
  </div>
  	 <div class="x_content">
	<body>
		 <?php if (isset($error)){ echo "<div class='alert alert-warning'><li>".$error."</li></div>"; }?>
		<form method ="POST" action = "<?php echo site_url('c_transaksi/tambah1');?>">
			
			<!--<div class="form-group">
			  <label>ID Lot For Lot</label>
			  <input type = "text" name = "no_lot" class = "form-control" readonly value="<?php echo $no_transaksi;?>">
			</div>
		-->
			<div class="form-group">
			  <label>ID Target Proyeksi</label>
			  <select name="no_target1" class="form-control">
			  	<option value="#" disabled selected>Pilih Target Proyeksi</option>
			 	 <?php
				foreach($tp as $data){
				echo "<option value = ".$data['no_target'].">".$data['no_target']." / ".$data['nama_bb']." / ".$data['bulan']." / ".$data['tahun']."</option>";
					}
				?>
			  </select>
			   <?php echo form_error('no_target1'); ?>
			</div>
				<button type="submit" class="btn btn-default btn-primary">Selanjutnya</button>
					<a type="button" class="btn btn-default" href="<?php echo site_url('c_transaksi/lihat_lot_for_lot');?>">Kembali</a>
			</form>
		
	</body>
</html>