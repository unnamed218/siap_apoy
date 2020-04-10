<html>
	<head>
		<title>Master Data Diskon</title>
	</head>
	<!-- <center><h3><b>Master Data Diskon</b></h3></center>
	<hr> -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Diskon</b></h3>
  </div>
  	 <div class="x_content">
  	 	
	<body>
		<form method = "POST" action = "<?php echo site_url('c_masterdata/tambah_diskon');?>">
			<div class="form-group">
			  <label>ID Diskon</label>
			  <input type = "text" name = "no_diskon" class = "form-control" value="<?php echo $id?>" readonly>
			
			</div>
			<div class="form-group">
			  <label>Supplier</label>
			  <select name="no_supplier" class="form-control">
			  	<option value="#" disabled selected>Pilih Supplier</option>
			  		<?php
			  	foreach($supplier as $data){
			  		echo "<option value = ".$data['no_supplier'].">".$data['nama_supplier']." - ".$data['nama_bb']."</option>";
			  	}
			  ?>
			</select>
			  <?php echo form_error('no_supplier'); ?>
			
			</div>
			<div class="form-group">
			  <label>Presentase Diskon (%)</label>
			  <input type = "text" name = "presentase_diskon" class = "form-control" maxlength="2">
			  
			  <?php echo form_error('presentase_diskon'); ?>
			
			</div>
			<div class="form-group">
			  <label>Pilihan Diskon</label>
			   <input type="text" class="form-control" name="pilihan_diskon" value="Jumlah Barang" readonly>
			</div>
			<div class="form-group" id="jumlah">
			  <label>Jumlah Barang</label>
			  <input type="number" class="form-control" name="jumlah_barang">
			
			  <?php echo form_error('jumlah_barang'); ?>
			
			 <div class="form-group">
			  	<label>Keterangan</label>
			  	<textarea type="text" class="form-control" name="keterangan_diskon" rows="3"></textarea>
			  <?php echo form_error('keterangan_diskon'); ?>
				</div>
			  <hr>
			<button type="submit" class="btn btn-default btn-primary">Simpan</button>
			<input type="button" class="btn btn-default" value="Kembali" onClick=history.go(-1);>
		</form>
	</body>
</html>