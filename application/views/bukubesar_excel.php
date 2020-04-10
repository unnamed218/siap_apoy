<html>
	<head>
	</head>
		
	<!-- <center><h3><b>Buku Besar</h3></b></center> -->
		<div class="x_panel">
 
  	 <div class="x_content">
	<body>
  	 	
		<h3 align = 'center'><b>Buku Besar <?php echo $dataakun['nama_coa'];?></b></h3>
		<hr>
				 <table id="datatable" class="table table-striped table-bordered table-hover">
		
			<tr>
				<th>Tanggal</th>
				<th>Keterangan</th>
				<th>Debit</th>
				<th>Kredit</th>
				<th>Saldo</th>
			</tr>
	
			<?php
				$saldo = $saldoawal['debit'] - $saldoawal['kredit'];
				
				echo "
					<tr>
						<td>0000-00-00</td>
						<td>Saldo Awal</td>
						<td></td>
						<td></td>
						<td align = 'right'>".format_rp($saldo)."</td>
					</tr>
				";
				foreach($jurnal as $data){
					$header_akun = substr($data['no_coa'], 1,1);
				
					echo "
						<tr>
							<td>".$data['tgl_jurnal']."</td>
							<td>".$data['nama_coa']."</td>
						";
					if($data['posisi_dr_cr'] == 'd'){
					
						if($header_akun == 1 or $header_akun == 5 or $header_akun == 6 ){
							$saldo = $saldo + $data['nominal'];
						}else{
							$saldo = $saldo - $data['nominal'];
						}        
						echo "
							<td align = 'right'>".format_rp($data['nominal'])."</td>
							<td></td>
							<td align = 'right'>".format_rp($saldo)."</td>
						</tr>
						";
					}else{
						
						if($header_akun == 1 or $header_akun == 5 or $header_akun == 6 ){
							$saldo = $saldo - $data['nominal'];
						}else{
							$saldo = $saldo + $data['nominal'];
						}
						
						echo "
							<td></td>
							<td align = 'right'>".format_rp($data['nominal'])."</td>
							<td align = 'right'>".format_rp($saldo)."</td>
						</tr>
						";
					}
				}
				
			?>
		<!-- <?php 
		echo "
					<tr>
						<td>0000-00-00</td>
						<td>Saldo Akhir</td>
						<td></td>
						<td></td>
						<td align = 'right'>".format_rp($saldo)."</td>
					</tr>
				";?> -->
		</table>
		<center>
</center>
		<!--<a href = "<?php echo site_url().'/m_keuangan/view_jurnal';?>" class="btn btn-info" role="button">Lihat Jurnal Umum</a>
		<a href = "<?php echo site_url().'/c_transaksi/view_trans';?>" class="btn btn-info" role="button">Pembelian</a>-->
	</body>
</html>