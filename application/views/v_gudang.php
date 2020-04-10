<html>
	<!-- <head><center><h3><b>Master Data Kapasitas Gudang</b></h3></center></head>
	<hr> -->
	<body>
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Daftar Kapasitas Gudang</b></h3>
  </div>
  	 <div class="x_content">
  	 	
		  <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 	<thead>
			<tr class="headings">
				<th style="width: 2px;">No</th>
				<th>ID Kapasitas Gudang</th>
				<th>Nama Bahan Baku</th>
				<th>Kapasitas</th>
				<th>Satuan</th>
				<th style="width: 60px;">Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
				foreach($result as $data){
					echo "
						<tr><td>$no</td>
							<td>".$data['no_kapasitas_gudang']."</td>
							<td>".$data['nama_bb']."</td>
							<td>".$data['jumlah_kapasitas_gudang']."</td>
							<td>".$data['satuan']."</td>" ?>
							<td>
							<a href="isi_gudang/<?php echo $data['no_kapasitas_gudang']; ?>"><span class="fa-stack">
							  <i class="fa fa-square fa-stack-2x" style="color:orange"></i>
							  <i class="fa fa-edit fa-stack-1x fa-inverse"></i>
							</span></a>
						</tr>
						
					<?php
					$no++;
				}
			?>
			</tbody>
		</table>

	</body>
</html>