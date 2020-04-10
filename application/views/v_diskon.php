<html>
	<!-- <head><h3><center><b>Master Data Diskon</b></center></h3></head>
	
	<hr> -->
	<body>
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Daftar Diskon</b></h3>
  </div>
  	 <div class="x_content">
<a href = "<?php echo site_url()."/c_masterdata/tambah_diskon"?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
		
		 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 	<thead>
			<tr class="headings">
				<th style="width: 2px;">No</th>
				<th>ID Diskon</th>
				<th>Nama Supplier</th>
				<th>%</th>
				<th>Jenis Diskon</th>
				<th>Keterangan Diskon</th>
				<th>Status</th>
			</tr>
		</thead>
			<tbody>
			<?php
			$no=1;
				foreach($result as $data){
					echo "
						<tr><td>$no</td>
							<td>".$data['no_diskon']."</td>
							<td>".$data['nama_supplier']." - ".$data['nama_bb']."</td>
							<td>".$data['presentase_diskon']."</td>
								<td>".$data['pilihan_diskon']."</td>
							<td>".$data['keterangan_diskon']."</td>
							" ?>
							<?php if($data['status'] == 1){?>
							<td align="center">
					<a class="btn btn-success" href="status_diskon/1/<?php echo $data['no_diskon']; ?>">ON</a>
							
							</td>
						<?php }else{ ?>
							<td align="center">
							<a class="btn btn-danger" href="status_diskon/0/<?php echo $data['no_diskon']; ?>">OFF</a>
							
							</td>
						<?php } ?>
						</tr>
						
					<?php
					$no++;
				}
			?>
		</tbody>
		</table>
		
	</body>
</html>