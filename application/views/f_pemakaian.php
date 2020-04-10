<html>
	<head>
		<title>Pemakaian Bahan Baku</title>
	</head>
	<!-- <center><h3><b>Pemakaian Bahan Baku</b></h3></center>
	<hr> -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Pemakaian Bahan Baku</b></h3>
  </div>
  	 <div class="x_content">
	<body>
		  <?php if (isset($error)){ echo "<div class='alert alert-danger'>".$error."</div>"; }?>
		  <?php if($cek != 0){?>
		<form method ="POST" action = "<?php echo site_url('c_transaksi/tambah_pemakaian');?>">
			<div class="form-group">
			  <label>ID Pemakaian Bahan Baku</label>
			  <input type = "text" name = "no_pemakaian_bb" class = "form-control" readonly value="<?php echo $no_transaksi;?>">
			</div>
			<div class="form-group">
			  <label>Tanggal</label>
			  <input type = "text"  class = "form-control" readonly value="<?php echo date('Y-m-d');?>">
			</div>
			<div class="form-group">
			  <label>Nama Bahan Baku</label>
			  <select name="no_bb" class="form-control">
			  	<option value="#" disabled selected>Pilih Bahan Baku</option>
			 	 <?php
				foreach($bahan_baku as $data){
				echo "<option value = ".$data['no_bb'].">".$data['nama_bb']." - ".format_rp($data['rata'])." - ".$data['unit']." ".$data['satuan']."</option>";
					}
				?>
			  </select>
			</div>
			  <?php echo form_error('no_bb'); ?>
			
			<div class="form-group">
			  <label>Jumlah</label>
			  <input type="text" name="jumlah_bahan_baku" class="form-control" maxlength="4">
			</div>
			  <?php echo form_error('jumlah_bahan_baku'); ?>
			
			<button type="submit" name="btnsubmit" class="btn btn-default btn-primary">Simpan</button>
			<a type="button" class="btn btn-default" href="<?php echo site_url('c_transaksi/view_trans');?>">Kembali</a>
			
		</form>
	<?php }else{?>
		Stok bahan baku sudah habis, silahkan melakukan pembelian bahan baku lagi  <a href = "<?php echo site_url()."/c_transaksi/view_trans"?>"><b>Kembali</b></a>
	<?php } ?>
	</body>
</html>