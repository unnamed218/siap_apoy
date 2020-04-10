<html>
	<head>
	</head>
	<body onload="javascript:window.print();">

		<!-- <center><h3>Pembelian</h3></center>
	 -->
		<div class="x_panel">
 
  	 <div class="x_content">
  	 
<p>
  	 <center><b>
  	 	<div style="font-size: 25px">
  	 	Bangnana Chips Bandung</div>
  	 <div style="font-size: 20px">Kartu Persediaan</div>
  
  	 <?php if(isset($awal, $akhir)){?>
  	 <div style="font-size: 15px">
  	 	Periode <?php echo $awal?> s/d <?php echo $akhir; }?>
  	 </div>
</b>
</center>
</p>
<hr>
<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
			<label>Nama Bahan Baku</label>
			<input type="text" class="form-control" value="<?php echo $bahan_baku1['nama_bb']?>" readonly>
		</div>
	</div>
	<div class="col-sm-6">
			<div class="form-group">
			<label>Satuan Bahan Baku</label>
			<input type="text" class="form-control" value="<?php echo $bahan_baku1['satuan']?>" readonly>
		</div>
	</div>
</div>

		 <table id="datatable" class="table table-striped table-bordered table-hover jambo_table">
		
				<th rowspan="2"> <center>No</center></th>
				<th rowspan="2">Tanggal</th>
				<th rowspan="2">Kode</th>
				<th rowspan="2">Keterangan</th>
				<th colspan="3">Penerimaan</th>
				<th colspan="3">Pengeluaran</th>
				<th colspan="3">Saldo</th>
				
						</tr>
			
			<tr>
				<th>Unit</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Unit</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Unit</th>
				<th>Harga</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			<tr>

			<?php 
			$no = 0;
			foreach($result as $data){
				
				$no++;
				$cek = substr($data['id_trans'],0,3);
				if($cek == 'PMB'){
				$maka = 'Pembelian';
				}else{
				$maka = 'Pemakaian';
				}
			
			


				echo "
			<td>$no</td>
			<td>".$data['tgl_trans']."</td>
			<td>".$data['id_trans']."</td>
			<td>".$maka."</td>
			<td>".$data['jumlah']."</td>
			<td>".format_rp($data['rata'])."</td>
			<td>".format_rp($data['total_pmb'])."</td>
			<td>".$data['jumlah_bahan_baku']."</td>
			<td>".format_rp($data['harga_satuan'])."</td>
			<td>".format_rp($data['subtotal_pmk'])."</td>
			<td>".$data['unit']."</td>
			<td>".format_rp($data['ratatotal'])."</td>
			<td>".format_rp($data['total'])."</td>

			";
			$totalpmb =0;
			$totalpmk = 0;
			$total = 0;
			$unit = 0;
			$unitpmb = 0;
			$unitpmk = 0 ;
			$totalpmb = $totalpmb;;
			$totalpmk = $totalpmk + $data['subtotal_pmk'];
			$unitpmb = $unitpmb + $data['jumlah'];
			$unitpmk = $unitpmk + $data['jumlah_bahan_baku'];
			// $total = $total + $data['total'];
			// $unit = $unit = $data['unit'];
	echo "
	</tr>
		";	}
		?>
		<!-- <tr>
			<td colspan="4">Total</td>
			<td><?php echo $unitpmb ;?></td>
			<td></td>
			<td><?php echo $totalpmb;?></td>
			<td><?php echo $unitpmk ;?></td>
			<td></td>
			<td><?php echo $totalpmk;?></td>
			<td><?php echo $unit ;?></td>
			<td></td>
			<td><?php echo $total;?></td>

		</tr> -->
		
		</tbody></table>
		
		
	</div>
</div>

	</body>
</html>

