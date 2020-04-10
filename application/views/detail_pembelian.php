<html>
	<head>
	</head>
	<body>
		<!-- <center><h3>Pembelian</h3></center>
	 -->
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Detail Pembelian</b></h3>
  </div>
  	 <div class="x_content">
  	 	
  	 		<div class="row">
				<div class="col-sm-6">
				<div class="form-group">
				<label>ID Pembelian</label> 
			<input type = "text" class = "form-control" value = "<?php echo $id;?>" readonly = 'readonly'>
			</div>
		</div>
			<div class="col-sm-6">
				<div class="form-group">
				<label>Tanggal Pembelian</label> 
			<input type = "text" class = "form-control" value = "<?php echo $tgl;?>" readonly = 'readonly'>
			</div>
		</div>
	</div>
	<hr>
		 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		
			<tr>
				<th>Bahan Baku</th>
				<th>Jumlah</th>
				<th>Subtotal</th>
				<th>Diskon</th>
				<th>Biaya Transportasi</th>
				<th>Total</th>
				
						</tr>
	
		<tbody>
			<?php
				foreach($result as $data){
					$subtotal = $data['harga'] * $data['jumlah'];
					$total = $subtotal - $data['diskon'] + 20000;
					echo "
						<tr>
							<td>".$data['nama_bb']." - ".format_rp($data['harga'])."</td>
							<td>".$data['jumlah']."</td>
							<td>".format_rp($subtotal)."</td>
							<td>".format_rp($data['diskon'])."</td>
							<td>".format_rp(20000)."</td>
							<td>".format_rp($total)."</td>";
							?>
								
								<?php 
				}
			?>

		</tbody>
		</table>
		<br>
			<input type="button" class="btn btn-default" value="Kembali" onClick=history.go(-1);>
	</body>
</html>

