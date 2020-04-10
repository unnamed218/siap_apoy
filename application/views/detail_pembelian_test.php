<html>
	<body>
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Daftar Detail Pembelian</b></h3>
  </div>
  	 <div class="x_content">
  	 	 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 	<thead>
			<tr class="headings">
				<th style="width: 2px;">No</th>
				<th>Keterangan</th>
				<th>Tanggal</th>
				<th>Jumlah</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
				foreach($result as $data){
					echo "

						<tr><td>$no</td>
							<td>".$data['nama_bb']." - ".format_rp($data['harga'])."</td>
							<td>".$data['tgl_pemb']."</td>
							<td>".$data['jumlah']." ".$data['satuan']."</td>
							<td align='right'>".format_rp($data['total'])."</td>" ?>
							

						</tr>
						
					<?php
					$no++;
				}
			?>
			</tbody>
		</table>

		<a href = "<?php echo site_url()."/c_masterdata/form_bb"?>" class="btn btn-info" role="button">Tambah Data</a>
	
	</body>
</html>