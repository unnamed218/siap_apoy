<html>
	<head>
		<title>Lot For Lot</title>
	</head>
<!-- 	<center><h3><b>Lot For Lot</b></h3></center>
 -->	
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Lot For Lot</b></h3>
  </div>
  	 <div class="x_content">
	<body>
			
		<div class="row">
				<div class="col-sm-4">
				<div class="form-group">
			<div style="font-size: 15px">
			<label>ID Lot For Lot</label> 
			<input type = "text" class = "form-control" value = "<?php echo $no_transaksi;?>" readonly = 'readonly'>
			</div>
		</div>
	</div>
			<div class="col-sm-4">
			<div class="form-group">
			<div style="font-size: 15px">
			 <label>ID Target Proyeksi</label>
				  <input type = "text" class = "form-control" value = "<?php echo $tp1['no_target'];?>" readonly = 'readonly'>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
			<div style="font-size: 15px">
			 <label>Nama Bahan Baku</label>
				  <input type = "text" class = "form-control" value = "<?php echo $tp1['nama_bb'];?>" readonly = 'readonly'>
				</div>
			</div>
		</div>
	
	</div>
	<div class="row">
			<div class="col-sm-6">
			<div class="form-group">
			<div style="font-size: 15px">
			<label>Kapasitas Gudang</label>
				  <input type = "text" class = "form-control" value = "<?php echo $cek['jumlah_kapasitas_gudang'] ." ". $tp1['satuan'];?>" readonly = 'readonly'>
				</div>
			</div>
		</div>
			<div class="col-sm-6">
			<div class="form-group">
			<div style="font-size: 15px">
			 <label>Target Proyeksi</label>
				  <input type = "text" class = "form-control" value = "<?php echo $tp1['jumlah'] ." ". $tp1['satuan'];?>" readonly = 'readonly'>
				</div>
			</div>
		</div>
	</div>
	<hr>
	 <div class="table-responsive">
		 <table class="table table-striped jambo_table bulk_action table-bordered table-hover">
			<thead>

		<tr class="headings">
				<th class="column-title">Permintaan</th>
				<th>Hasil Lot</th>
				<th>Biaya Pesan</th>
				<th>Biaya Simpan</th>
				<th>Total Biaya</th>
				<th>Pilih</th>
			</tr>
		</thead>
		<?php 

      	$permintaan=array("2","4","6","8","10");
      	$nama_bb = $tp1['nama_bb'];
      	$no_target = $tp1['no_target'];
      	$jml = count($permintaan);
		for($c=0; $c<$jml; $c+=1){
				$nilai = $tp1['jumlah']/$permintaan[$c];
				$totalbiaya = $tp1['jumlah']*$tp1['harga']+($permintaan[$c]*20000+$nilai/2*500);
			echo "
		
		<tr>
				<td>$permintaan[$c]</td>
				<td>".round($nilai)."</td>
				<td>".format_rp(20000)."</td>
				<td>".format_rp(500)."</td>
				<td>".format_rp(round($totalbiaya))."</td>" 
				?>
				<?php if($cek['jumlah_kapasitas_gudang'] >= $nilai ){?>
				<td align='center'>
							<a class="btn btn-primary btn-sm" href="tambah2/<?php echo $permintaan[$c]."/".round($nilai)."/".$totalbiaya."/".$no_transaksi."/".$tp1['no_bb']."/".$no_target; ?>"><span class="fa fa-cart-arrow-down"></a>
							</td>
		</tr>
		
			<?php
		}else{ ?>
			<td align='center'>
							<a class="btn btn-danger btn-md" href="#"><span class="fa fa-cart-arrow-down"></a>
							</td>

			<?php
			}
				}
			?>
		</table>

	</div>
	<div class="row">
		<div class="col-md-11">
	*Biaya Pesan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo format_rp(20000);?> / Kali<br>
	*Biaya Simpan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo format_rp(500);?> / Satuan Berat<br>
	*Rumus Total Biaya : Target Proyeksi * Harga Satuan (Bahan Baku) + (Permintaan LFL * Biaya Pesan + Hasil LFL / 2 * Biaya Simpan)<br>
	*Total Biaya belum termasuk diskon!
</div>
<div class="col-md-1">
	<a type="button" class="btn btn-default" href="<?php echo site_url('c_transaksi/lihat_lot_for_lot');?>">Kembali</a>
			</div>
		</body>

</html>