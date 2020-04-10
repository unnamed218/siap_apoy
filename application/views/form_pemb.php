<html>
	<head>
	</head>
	<body>
	<!-- <center><h3><b>Pembelian</b></h3></center>
	
	 -->	<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Pembelian</b></h3>
  </div>
  	 <div class="x_content">
		<form method = "POST" action = "<?php echo site_url('c_transaksi/form_pemb2');?>">
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
				 <select name = "no_supplier" class = "form-control">
				 	<option value="#" disabled selected>Pilih Supplier</option>
				<?php
					foreach($result as $data){
						if($data['status'] == 1){
						echo "<option value = ".$data['no_supplier'].">".$data['nama_supplier']." - Diskon ".$data['presentase_diskon']."% - ".$data['keterangan_diskon']."</option>";
					}
					
				}
				?>
			  </select>
			</div>
		</div>
	</div>
			

			<button type="submit" class="btn btn-primary">Selanjutnya</button>
			<a type="button" class="btn btn-default" href="<?php echo site_url('c_transaksi/view_trans');?>">Kembali</a>
		</form>
		
	</body>
</html>