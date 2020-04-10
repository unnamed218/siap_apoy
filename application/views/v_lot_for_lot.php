<html>
	<!-- <head><h3><center><b>Lot For Lot</b><center></h3></head>
	<hr> -->
	<body>
		
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Daftar Lot For Lot</b></h3>
  </div>
  	 <div class="x_content">
  	 	<a href = "<?php echo site_url()."/c_transaksi/tambah1"?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
		 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 	<thead>
			<tr class="headings">
				<th style="width: 2px;">No</th>
				<th>ID Lot For Lot</th>
				<th colspan="3">Target Proyeksi</th>
				<th>Jumlah Lot For Lot</th>
				<th>Hasil</th>
				<th>Satuan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
				foreach($result as $data){
					echo "
						<tr><td>$no</td>
							<td>".$data['no_lot']."</td>
						<td style='width:150px'>".$data['nama_bb']."</td>
							<td style='width:100px'>".$data['bulan']." </td>
							<td>".$data['tahun']."</td>
							<td>".$data['jumlah_lot']."</td>
							<td>".$data['hasil_lot']."</td>
							<td>".$data['satuan']."</td>" ?>
							<!--<td align="center">
							<a class="btn btn-primary" href="isi_edit_bb/<?php echo $data['no_bb']; ?>">Ubah</a>
							</td>-->
							<!--<td align="center">
							<a class="btn btn-warning" href="isi_edit_bb/<?php echo $data['no_bb']; ?>" onclick="return confirm('Yakin mau dihapus?')" class="btn btn-daner">Hapus</a>
					</td>-->
						</tr>
					<?php
					$no++;
				}
			?>
		</tbody>
		</table>
		

	</body>
</html>