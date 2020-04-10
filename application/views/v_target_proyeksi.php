<html>
	<!-- <head><center><h3><b>Target Proyeksi</b></h3></center></head>
	<hr> -->
	<body>
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Daftar Target Proyeksi</b></h3>
  </div>
  	 <div class="x_content">
  	 		<a href = "<?php echo site_url()."/c_transaksi/tambah_target_proyeksi"?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
		 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 	<thead>
			<tr class="headings">
				<th style="width: 2px;">No</th>
				<th>ID Target Proyeksi</th>
				<th>Nama Bahan Baku</th>
				<th>Bulan</th>
				<th>Tahun</th>
				<th>Jumlah</th>
				<th>Satuan</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
				foreach($result as $data){
					echo "
						<tr><td>$no</td>
							<td>".$data['no_target']."</td>
							<td>".$data['nama_bb']."</td>
							<td>".$data['bulan']."</td>
							<td>".$data['tahun']."</td>
							<td>".$data['jumlah']."</td>
							<td>".$data['satuan']."</td>
							<td>".$data['status']."</td>" ?>
						</tr>
					<?php
					$no++;
				}
			?>
		</tbody>
		</table>
	


	</body>
</html>