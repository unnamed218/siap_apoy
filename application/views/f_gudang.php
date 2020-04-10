<html>
	<head>
		<title>Master Data Kapasitas Gudang</title>
	</head>
	<!-- <center><h3><b>Master Data User</b></h3></center>
	<hr> -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Kapasitas Gudangr</b></h3>
  </div>
  	 <div class="x_content">
	<body>
		<form method = "POST" action = "<?php echo site_url('c_masterdata/tambah_gudang');?>">
		
			<div class="form-group">
			  <label>ID Kapasitas Gudang</label>
			  <input type = "text" name = "no_kapasitas_gudang" class = "form-control" value="<?php echo $id;?>" readonly>
			</div>

			<div class="form-group">
			  <label>Nama Bahan Baku</label>
			    <input type = "text" class = "form-control" value="<?php echo $id;?>" readonly>
				
			</div>
			<div class="form-group">
			  <label>Batas Kapasitas Gudang</label>
			 <input type="number" class="form-control" name="jumlah_kapasitas_gudang">
			  <?php echo form_error('batas_kapasitas_gudang'); ?>
			</div>
			
			
			<button type="submit" class="btn btn-default btn-primary">Simpan</button>
			<a href = "<?php echo site_url()."/c_masterdata/lihat_gudang"?>" type="button" class="btn btn-default">Kembali</a>
		</form>
	</body>
</html>