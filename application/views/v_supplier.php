<html>
	<!-- <head><center><h3><b>Master Data Bahan Baku</b></h3></center></head>
	<hr> -->
	<body>
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Daftar Supplier</b></h3>
  </div>
  	 <div class="x_content">
  	 	<a href = "<?php echo site_url()."/c_masterdata/form_supplier"?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
  	 	 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 	<thead>
			<tr class="headings">
			<th style="width: 2px;">No</th>
				<th>ID Supplier</th>
				<th>Nama Supplier</th>
				<th>Bagian</th>
				<th>Alamat</th>
				<th>No HP</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
				foreach($result as $data){
					echo "

						<tr><td>$no</td>
							<td>".$data['no_supplier']."</td>
							<td>".$data['nama_supplier']."</td>
							<td>".$data['nama_bb']."</td>
							<td>".$data['alamat']."</td>
							<td>".$data['no_hp']."</td>" ?>
							<td>
							<a href="isi_edit_supplier/<?php echo $data['no_supplier']; ?>"><span class="fa-stack">
							  <i class="fa fa-square fa-stack-2x" style="color:orange"></i>
							  <i class="fa fa-edit fa-stack-1x fa-inverse"></i>
							</span></a>
							</td>
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