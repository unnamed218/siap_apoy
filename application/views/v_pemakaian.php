<html>
	<!-- <head><center><h3><b>Pemakaian Bahan Baku</b></h3></center></head>
	<hr> -->
	<body>
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Daftar Pemakaian Bahan Baku</b></h3>
  </div>
  	 <div class="x_content">
  	 	
		<a href = "<?php echo site_url()."/c_transaksi/tambah_pemakaian"?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-plus"></span>Tambah Data</a>
		 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 	<thead>
			<tr class="headings">
				<th style="width: 2px;">No</th>
				<th>ID Pemakaian</th>
				<th>Tanggal</th>
				<th>Nama Bahan Baku</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
				foreach($result as $data){
					echo "
						<tr><td>$no</td>
							<td>".$data['no_pemakaian_bb']."</td>
							<td>".$data['tgl_pemakaian_bb']."</td>
							<td>".$data['nama_bb']."</td>
							<td>".$data['jumlah_bahan_baku']."</td>" ?>
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