<html>
	<!-- <head><h3><center><b>Master Data User</b></center></h3></head>
	
	<hr> -->
	<body>
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Daftar User</b></h3>
  </div>
  	 <div class="x_content">
	<a href = "<?php echo site_url()."/c_masterdata/tambah_user"?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
		  <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 	<thead>
			<tr class="headings">
				<th style="width: 2px;">No</th>
				<th>Nama Lengkap</th>
				<th>Username</th>
				<th>Password</th>
				<th>Jabatan</th>
			</tr>
		</thead>
			<tbody>
			<?php
			$no=1;
				foreach($result as $data){
					echo "
						<tr><td>$no</td>
							<td>".$data['nama_lengkap']."</td>
							<td>".$data['username']."</td>
							<td>".md5($data['password'])."</td>
							<td>".$data['level']."</td>
							" ?>
							<!--<td align="center">
							<a class="btn btn-primary" href="isi_edit_COA/<?php echo $data['no_COA']; ?>">Ubah</a>
							</td>
							<td align="center">
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