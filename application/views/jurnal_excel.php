<html>
	<body>
	<!-- 	
	<center><h3><b>Jurnal</b></h3></center>
	<hr> -->
		<div class="x_panel">
 
  	 <div class="x_content">
  	 	


  	 	<center><h2><b>JURNAL<br>
  	 	<!-- BANGNANA CHIPS BANDUNG -->
  	 </b></h2></center>


	<br>
	 <table id="datatable" class="table table-striped table-bordered">
		 	
			<tr class="headings">
			<th style="width:2px">No</th>
			<th>Tanggal</th>

			<th style="width:2px">Sumber</th>
			<th>Keterangan</th>
			<th style="width:2px">Ref</th>
			<th>Debit</th>
			<th>Kredit</th>
		</tr>
	

		<?php 
		$no = 0;

		$total =0;
		$total2 =0;
			foreach ($jurnal as $data)
			{	
								$no++;
				$tgl_jurnal = substr($data['tgl_jurnal'], 0,10);
				if($data['posisi_dr_cr'] == 'd'){
				echo"<tr>

					<td>$no</td>
						<td>".$tgl_jurnal."</td>
						<td>".$data['id_jurnal']."";
					}else{
						echo"<tr>
						<td>$no</td>
								<td></td>
								<td></td>";
					}
						
				if ($data['posisi_dr_cr']=='d')
				{
					
					echo"
					
					
						<td>".$data['nama_coa']."</td>
						<td>".$data['no_coa']."</td>
						<td align = 'right'>".format_rp($data['nominal'])."</td>
						<td align = 'right'></td>";
						$total = $total+$data['nominal'];
				}else{
					echo"
						<td align='center'>".$data['nama_coa']."</td>
						<td>".$data['no_coa']."</td>
						<td align = 'right'></td>
						<td align = 'right'>".format_rp($data['nominal'])."</td>
					</tr>
					
				";
				$total2=$total2+$data['nominal'];
				}
			}
		?>
		<tr>
			<td colspan="4" align='center'>Total</td>
			<td align ="right"><?php echo format_rp($total) ; ?></td>
			<td align ="right"><?php echo format_rp($total2) ;?></td>
		</tr>
	
	</table>

	
	</body>
	</html>