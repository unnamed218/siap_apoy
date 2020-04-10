<html>
	<head>
		<title>Lot For Lot</title>
	</head>
<!-- 	<center><h3><b>Lot For Lot</b></h3></center>
 -->	
		<div class="x_panel">
 <div class="x_title">
    <h3 class="panel-title"><b>Form Lot For Lot</b></h3>
  </div>
  	 <div class="x_content">
	<body>
			
		<div class="row">
				<div class="col-sm-4">
				<div class="form-group">
			<div style="font-size: 15px">
			<label>ID Lot For Lot</label> 
			<input type = "text" class = "form-control" value = "<?php echo $no_transaksi;?>" readonly = 'readonly'>
			</div>
		</div>
	</div>
			<div class="col-sm-4">
			<div class="form-group">
			<div style="font-size: 15px">
			 <label>ID Target Proyeksi</label>
				  <input type = "text" class = "form-control" value = "<?php echo $tp1['no_target'];?>" readonly = 'readonly'>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
			<div style="font-size: 15px">
			 <label>Nama Bahan Baku</label>
				  <input type = "text" class = "form-control" value = "<?php echo $tp1['nama_bb'];?>" readonly = 'readonly'>
				</div>
			</div>
		</div>
	
	</div>
	<div class="row">
			<div class="col-sm-6">
			<div class="form-group">
			<div style="font-size: 15px">
			<label>Kapasitas Gudang</label>
				  <input type = "text" class = "form-control" value = "<?php echo $cek['jumlah_kapasitas_gudang'] ." ". $tp1['satuan'];?>" readonly = 'readonly'>
				</div>
			</div>
		</div>
			<div class="col-sm-6">
			<div class="form-group">
			<div style="font-size: 15px">
			 <label>Target Proyeksi</label>
				  <input type = "text" class = "form-control" value = "<?php echo $tp1['jumlah'] ." ". $tp1['satuan'];?>" readonly = 'readonly'>
				</div>
			</div>
		</div>
	</div>
	<hr>
	 <div class="table-responsive">
	 

		 <table class="table table-striped jambo_table bulk_action table-bordered table-hover">
			<thead>

		<tr class="headings">
				<th class="column-title">Permintaan</th>
				<th>Hasil Lot</th>
				<th>Biaya Pesan</th>
				<th>Biaya Simpan</th>
				<th>Total Biaya</th>
				<th>Pilih</th>
			</tr>
		</thead>

		<?php
			// var_dump($cek['jumlah_kapasitas_gudang']); 
		$MAX_VALUE =  1000000000;
		$MAX_VALUE1 = 1000000000;
		$MAX_VALUE2 = 1000000000;
		$MAX_VALUE3 = 1000000000;
		$MAX_VALUE4 = 1000000000;
		$min = 0;
		$total1 = $tp1['jumlah']*$tp1['harga']+(2*20000+($tp1['jumlah']/2)/2*500);
		$total2 = $tp1['jumlah']*$tp1['harga']+(4*20000+($tp1['jumlah']/4)/2*500);
		$total3 = $tp1['jumlah']*$tp1['harga']+(6*20000+($tp1['jumlah']/6)/2*500);
		$total4 = $tp1['jumlah']*$tp1['harga']+(8*20000+($tp1['jumlah']/8)/2*500);
		$total5 = $tp1['jumlah']*$tp1['harga']+(10*20000+($tp1['jumlah']/10)/2*500);
		$nilai1 = $tp1['jumlah'] / 2;
		$nilai2 = $tp1['jumlah'] / 4;
		$nilai3 = $tp1['jumlah'] / 6;
		$nilai4 = $tp1['jumlah'] / 8;
		$nilai5 = $tp1['jumlah'] / 10;

		$permintaan = array( 
 	array('2','4','6','8','10'),
 	array($total1,$total2,$total3,$total4,$total5),
 	array($nilai1,$nilai2,$nilai3,$nilai4,$nilai5));
      	// $permintaan=array("2","4","6","8","10");
      	$nama_bb = $tp1['nama_bb'];
      	$no_target = $tp1['no_target'];
      	$jml = count($permintaan[0]);
      	$terendah = min($total1, $total2, $total3, $total4, $total5);
      	// var_dump($terendah);
		for($c=0; $c<$jml; $c+=1){
				$nilai = $tp1['jumlah']/$permintaan[0][$c];
				//$cek = substr($permintaan[0][$c], 5,1);

			echo "
		
		<tr>
				";
				?>
				<?php 

				if($permintaan[1][$c] <= $permintaan[1][$c] ){
				$MAX_VALUE = $permintaan[1][$c];
			}
				?>
				<?php 
				
				if($permintaan[1][$c] == $terendah){
						echo "
						<td>".$permintaan[0][$c]."</td>
				<td>".round($nilai)."</td>
				<td>".format_rp(20000)."</td>
				<td>".format_rp(500)."</td>
				<td style='background-color: lightgreen ;color:black;'><b>".format_rp(round($permintaan[1][$c]))."</b></td>";
			}
			else{
			echo "
			<td>".$permintaan[0][$c]."</td>
				<td>".round($nilai)."</td>
				<td>".format_rp(20000)."</td>
				<td>".format_rp(500)."</td>
				<td><b>".format_rp(round($permintaan[1][$c]))."</b></td>";
			}

		

				if($cek['jumlah_kapasitas_gudang'] >= $permintaan[2][$c]  ){?>
				<td align='center'>
							<a class="btn btn-primary btn-md" href="tambah2/<?php echo $permintaan[0][$c]."/".round($nilai)."/".$permintaan[1][$c]."/".$no_transaksi."/".$tp1['no_bb']."/".$no_target; ?>"><span class="fa fa-cart-arrow-down"></a>
							</td>
		</tr>
		
			<?php
		}else{ ?>
			<td align='center'>
							<a class="btn btn-danger btn-md" href="#"><span class="fa fa-cart-arrow-down"></a>
							</td>

			<?php
			}
				}
				// echo "$MAX_VALUE";
				//  $MAX_VALUE=200;

    // $a=array(5,23,7);
    // for($i=0;$i<count($a) ;$i++){
    //          if($a[$i] <$MAX_VALUE){
    //              $MAX_VALUE=$a[$i];
    //          }
    // }
    // echo "Bilangan Terkecilnya adalah <b>".$MAX_VALUE."</b>";

			?>
		</table>

	</div>
	<div class="row">
		<div class="col-md-11">
	<table>
	 			<tr>
	 				<th><b>*</b>&nbsp</th>
	 				<th>
	 		<div style="width: 15px; height:15px; background-color: lightgreen;"></div>
	 </th>
	 <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: Murah</td>
	 	
	 </tr>
	</table>
	*Biaya Pesan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo format_rp(20000);?> / Kali<br>
	*Biaya Simpan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo format_rp(500);?> / Satuan Berat<br>
	*Rumus Total Biaya : Target Proyeksi * Harga Satuan (Bahan Baku) + (Permintaan LFL * Biaya Pesan + Hasil LFL / 2 * Biaya Simpan)<br>
	*Total Biaya belum termasuk diskon! <br>

	
</div>
<div class="col-md-1">
	<a type="button" class="btn btn-default" href="<?php echo site_url('c_transaksi/lihat_lot_for_lot');?>">Kembali</a>
			</div>
		</body>

</html>