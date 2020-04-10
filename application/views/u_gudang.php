<html>
	<head>
		<title>Master Data Kapasitas Gudang</title>
	</head>
	<!-- <center><h3><b>Master Data Kapasitas Gudang</b></h3></center>
	<hr> -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Edit Kapasitas Gudang</b></h3>
  </div>
  	 <div class="x_content">
	<body>
		<form method = "POST" action = "<?php echo site_url('c_masterdata/tambah_gudang');?>">
		
			<div class="form-group">
			  <label>ID Kapasitas Gudang</label>
			  <input type = "text" name = "no_kapasitas_gudang" class = "form-control" value="<?php echo $isi['no_kapasitas_gudang'];?>" readonly>
			</div>

			<div class="form-group">
			  <label>Nama Bahan Baku</label>
			    <input type = "text" class = "form-control" value="<?php echo $isi['nama_bb'];?>" readonly>
				
			</div>
			<div class="form-group">
			  <label>Batas Kapasitas Gudang</label>
			 <input type="number" class="form-control" name="jumlah_kapasitas_gudang" required>
			  <?php echo form_error('jumlah_kapasitas_gudang'); ?>
			</div>
			
			
			<button type="submit" class="btn btn-default btn-primary" value="tester">Simpan</button>
		<a href = "<?php echo site_url()."/c_masterdata/lihat_gudang"?>" class="btn btn-default" role="button">Kembali</a>
		</form>
	</body>
</html>