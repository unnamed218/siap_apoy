<html>
	<!-- <head><h3><center><b>Pembelian</b><center></h3></head>
	<hr> -->
	<body>
		
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Pembelian</b></h3>
  </div>
  	 <div class="x_content">
  	 	 <?php if (isset($error)){ echo "<div class='alert alert-danger'><li>".$error."</li></div>"; }?>
		 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 	<thead>
			<tr class="headings">
				<th>No</th>
				<th>ID Lot For Lot</th>
			<th colspan="3">Target Proyeksi</th>
				<th>Jumlah Lot For Lot</th>
				<th>Hasil</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
				foreach($result as $data){
					if($data['jumlah_lot'] > 0){
						$cek = $data['stok'] + $data['hasil_lot'];
					echo "
						<tr><td>$no</td>
							<td>".$data['no_lot']."</td>
							<td style='width:150px'>".$data['nama_bb']."</td>
							<td style='width:100px'>".$data['bulan']." </td>
							<td>".$data['tahun']."</td>
							<td>".$data['jumlah_lot']."</td>
							<td>".$data['hasil_lot']."</td>"?>
							<?php if($data['stok'] <= $data['jumlah_kapasitas_gudang'] AND $data['jumlah_kapasitas_gudang'] >= $cek){?>
							<td align="center">
							<a class="btn btn-primary" href="form_pemb/<?php echo $data['no_lot']; ?>"><span class="fa fa-cart-arrow-down"></span></a>
							</td>
						<?php }else{?>
							<td align="center">
							<a class="btn btn-danger" href="#"><span class="fa fa-cart-arrow-down"></span></a>
							</td>
							<!--<td align="center">
							<a class="btn btn-warning" href="isi_edit_bb/<?php echo $data['no_bb']; ?>" onclick="return confirm('Yakin mau dihapus?')" class="btn btn-daner">Hapus</a>
					</td>-->
						</tr>
					<?php
					$no++;
					
				}
			}
			}
			?>
		</tbody>
		</table>
		<a href = "<?php echo site_url()."/c_transaksi/view_trans"?>" type="button" class="btn btn-default">Kembali</a>

	</body>
</html>