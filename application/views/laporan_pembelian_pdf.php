	<!DOCTYPE html>
	<html>
	<head>
		<title>Laporan Pembelian</title>
	</head>
		<body onload="javascript:window.print();">
	<!-- 	<center><h3><b>Laporan Pembelian</b></h3></center>
	<hr> -->
	<div class="x_panel">
 
  	 <div class="x_content">
  	 
  	 		<p>
  	 <center><b>
  	 	<div style="font-size: 25px">
  	 	<!-- Bangnana Chips Bandung -->
  	 </div>
  	 <div style="font-size: 20px">Laporan Pembelian</div>
  	<?php if(isset($bulan, $tahun)){ ?>
  	 <div style="font-size: 15px">
  	 	Per Bulan <?php echo $bulan?> Tahun <?php echo $tahun; ?>
  	 </div>
  	 <?php }?>
</b>
</center>
</p>
	 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		 
		<td>Id Transaksi</td>
		<td>Tanggal Transaksi</td>
		<td>Total Transaksi</td>
	</tr>

	<?php
		$total=0;
				foreach($result as $data){
						echo"
					<tr>
						<td>".$data['id_pemb']."</td>
						<td>".$data['tgl_pemb']."</td>
						<td align='right'>".format_rp($data['total_pmb'])."</td>
					</tr>
					";
					$total = $total+$data['total_pmb'];
		}
		?>
		</tbody>
		<tr>

			<td colspan=2 align='center'> Total</td>
			<td align='right'><?php echo format_rp($total);?></td>
		</tr>
	</table>

</body>
</html>