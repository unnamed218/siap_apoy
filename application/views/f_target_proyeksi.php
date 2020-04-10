<html>
	<head>
		<title>Target Proyeksi</title>
	</head>
	<!-- <center><h3><b>Target Proyeksi</b></h3></center>
	<hr> -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Daftar Target Proyeksi</b></h3>
  </div>
   <?php if (isset($error)){ echo "<div class='alert alert-danger'>".$error."</div>"; }?>
  	 <div class="x_content">
	<body>
		<form method ="POST" action = "<?php echo site_url('c_transaksi/tambah_target_proyeksi');?>">
			<div class="form-group">
			  <label>ID Target Proyeksi</label>
			  <input type = "text" name = "no_target_proyeksi" class = "form-control" readonly value="<?php echo $no_transaksi;?>">
			</div>
			<div class="form-group">
			  <label>Nama Bahan Baku</label>
			  <select name="no_bb" class="form-control">
			  	<option value="#" disabled selected>Pilih Bahan Baku</option>
			 	 <?php
				foreach($bahan_baku as $data){
				echo "<option value = ".$data['no_bb'].">".$data['nama_bb']."</option>";
					}
				?>
			  </select>
			</div>
			  <?php echo form_error('no_bb'); ?>
			<div class="form-group">
			  <label>Bulan</label>
			  <select name="bulan" class="form-control">
			  	 <option value="#" disabled selected>Pilih Bulan</option>
			 <?php 
			 $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			$jlh_bln=count($bulan);
			for($c=0; $c<$jlh_bln; $c+=1){
    		echo"<option value=$bulan[$c]> $bulan[$c] </option>";
			}
			?>
			 </select>
			</div>
			  <?php echo form_error('bulan'); ?>
			<div class="form-group">
			  <label>Tahun</label>
			<select name="tahun" class="form-control">
				<option value="#" disabled selected>Pilih Tahun</option>
				<?php
				$now =date('Y');
				for ($a=2015;$a<=$now;$a++)

					{

     echo "<option value=' ".$a." '>".$a."</option>";

					}
				?>
				</select>
			</div>
			  <?php echo form_error('tahun'); ?>

			<div class="form-group">
			  <label>Jumlah</label>
			  <input type="number" name="jumlah" class="form-control">
			</div>
			  <?php echo form_error('jumlah'); ?>
			
			<button type="submit" name="btnsubmit" class="btn btn-default btn-primary">Simpan</button>
			<a href="<?php echo site_url()."/c_transaksi/lihat_target_proyeksi"?>" type="button" class="btn btn-default">Kembali</a>
		</form>
	</body>
</html>