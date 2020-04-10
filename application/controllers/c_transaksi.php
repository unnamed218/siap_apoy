   <?php
class c_transaksi extends CI_controller{

  //MENENTUKAN TRANSAKSI TARGET PROYEKSI

  //tersterrsadasdsa
  //asdadsadas
  public function form_target_proyeksi(){
       if(!empty($this->session->userdata('level'))){
    
      $query1 = "SELECT  MAX(RIGHT(no_target,3)) as kode FROM target_proyeksi";
      $abc = $this->db->query($query1);
      $no_trans = "";
      if($abc->num_rows()>0){
            foreach($abc->result() as $k){
              $tmp = ((int)$k->kode)+1;
              $kd = sprintf("%03s", $tmp);
            }
          }else{
            $kd = "001";
          }
      $no_trans = "TP_".$kd;

    $data['no_transaksi']=$no_trans;
    $data['bahan_baku']=$this->db->get('bahan_baku')->result_array();
   $this->template->load('template','f_target_proyeksi',$data);
   // $this->load->view('f_target_proyeksi',$data);
    }else{
      redirect('c_login/home');
    }
  }
  

  public function tambah_target_proyeksi(){
       if(!empty($this->session->userdata('level'))){
    
     $config = array(
            
            array(
                'field' => 'no_bb',
                'label' => 'Nama Bahan Baku',
                'rules' => 'required',
                'errors' => array(
                   'required' => '%s tidak boleh kosong!'
                )
            ),
            array(
                'field' => 'bulan',
                'label' => 'Bulan',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s tidak boleh kosong!'
                )
            ),
      array(
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => array(
                   'required' => '%s tidak boleh kosong!'
                )
            ),
            array(
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'required|is_natural_no_zero|min_length[1]|max_length[11]',
                'errors' => array(
                    'required' => '%s tidak boleh kosong!',
                    'is_natural_no_zero' => '%s tidak boleh minus atau 0!',
                   'min_length' => '%s minimal 1 huruf!',
                    'max_length' => '%s maksimal 11 huruf!',
                )
            )
        );
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE){
            $this->form_target_proyeksi();
        }else{
           $cek = $this->db->query("SELECT * FROM target_proyeksi where 
            no_bb='".$_POST['no_bb']."' AND
            bulan='".$_POST['bulan']."' AND
            tahun='".$_POST['tahun']."'")->num_rows();
          if($cek == 0){
            $data = array(
            'no_target' => $_POST['no_target_proyeksi'],
            'no_bb' => $_POST['no_bb'],
            'bulan' => $_POST['bulan'],
            'tahun' => $_POST['tahun'],
            'jumlah' => $_POST['jumlah'] ,
            'presentase' => 0,
            'status' => 'Belum');
    $this->db->insert('target_proyeksi',$data);
    redirect('c_transaksi/lihat_target_proyeksi');
        }else{

      $query1 = "SELECT  MAX(RIGHT(no_target,3)) as kode FROM target_proyeksi";
      $abc = $this->db->query($query1);
      $no_trans = "";
      if($abc->num_rows()>0){
            foreach($abc->result() as $k){
              $tmp = ((int)$k->kode)+1;
              $kd = sprintf("%03s", $tmp);
            }
          }else{
            $kd = "001";
          }
      $no_trans = "TP_".$kd;

    $data['no_transaksi']=$no_trans;
    $data['bahan_baku']=$this->db->get('bahan_baku')->result_array();
           $data['error'] = 'Bahan Baku, bulan dan tahun sudah ada didatabase';
          $this->template->load('template','f_target_proyeksi', $data);
          // $this->form_target_proyeksi($error);

        }
      }


        }else{
      redirect('c_login/home');
    }
    
  }
  
  public function lihat_target_proyeksi(){
       if(!empty($this->session->userdata('level'))){
    
    $this->db->select('*'); 
    $this->db->from('target_proyeksi a');
    $this->db->join('bahan_baku b', 'a.no_bb = b.no_bb');
    $data['result']=$this->db->get()->result_array();
    $this->template->load('template','v_target_proyeksi',$data);
    }else{
      redirect('c_login/home');
    }
  }
  
  //MENGHITUNG LOT FOR LOT COYYYY!

  public function form_lot_for_lot(){
       if(!empty($this->session->userdata('level'))){
      
    $this->db->where('status', 'Belum');
    $this->db->join('bahan_baku b', 'a.no_bb = b.no_bb');
    $data['tp']=$this->db->get('target_proyeksi a')->result_array();
   $this->template->load('template','f_lot_for_lot',$data);
   // $this->load->view('f_target_proyeksi',$data);
  }else{
      redirect('c_login/home');
    }
  }


   public function tambah1(){
       if(!empty($this->session->userdata('level'))){
    
    //menampilkan target proyeksi atau form nya
  //  $data['tp']=$this->db->get('target_proyeksi')->result_array();
    //no transaksi
     $config = array(
            
            array(
                'field' => 'no_target1',
                'label' => 'ID Target Proyeksi',
                'rules' => 'required',
                'errors' => array(
                   'required' => '%s tidak boleh kosong!'
                )
            )
        );
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE){
            $this->form_lot_for_lot();
        }else{
      $query1 = "SELECT  MAX(RIGHT(no_lot,3)) as kode FROM lot_for_lot";
      $abc = $this->db->query($query1);
      $no_trans = "";
      if($abc->num_rows()>0){
            foreach($abc->result() as $k){
              $tmp = ((int)$k->kode)+1;
              $kd = sprintf("%03s", $tmp);
            }
          }else{
            $kd = "001";
          }
      $no_trans = "LFL_".$kd;
      $data['no_transaksi']=$no_trans;
      //menampilkan
      $this->db->select('*');
      $this->db->from('target_proyeksi a');
      $this->db->join('bahan_baku b', 'a.no_bb = b.no_bb');
      $this->db->where('no_target', $_POST['no_target1']);
      $data['tp1']=$this->db->get()->row_array();
      $this->db->select('*');
      $this->db->from('target_proyeksi a');
      $this->db->join('bahan_baku b', 'a.no_bb = b.no_bb');
      $this->db->join('kapasitas_gudang c', 'b.no_bb = c.no_bb');
      $this->db->where('no_target', $_POST['no_target1']);
      $data['cek'] = $this->db->get()->row_array();
      $this->template->load('template','test_lot_for_lot',$data);
      }
    }else{
      redirect('c_login/home');
    }
       }

    public function tambah2($demand,$nilai,$totalbiaya,$no_trans,$no_bb,$no_target){
    if(!empty($this->session->userdata('level'))){
      $data['demand'] = $demand;
      $data['nilai'] = $nilai;
      $data['totalbiaya'] = $totalbiaya;
      $this->db->where('no_bb', $no_bb);
      $data['kapasitas_gudang'] = $this->db->get('kapasitas_gudang')->row()->jumlah_kapasitas_gudang;
      $this->db->where('no_target', $no_target);
      $data['no_target'] = $this->db->get('target_proyeksi')->row_array();
      $data['no_trans'] = $no_trans;
      $this->template->load('template', 'f_lot_for_lot2', $data);
    }else{
      redirect('c_login/home');
    }
    }

    public function tambah3(){
      $data = array('no_lot' => $_POST['no_lot'],
                    'no_target' => $_POST['no_target'],
                    'jumlah_lot' => $_POST['jumlah_lot'],
                    'hasil_lot' => $_POST['hasil_lot'],
                    'total_biaya' => $_POST['total_biaya']);
      $this->db->insert('lot_for_lot', $data);


      $this->db->set('status', 'Selesai LFL');
      $this->db->where('no_target', $_POST['no_target']);
      $this->db->update('target_proyeksi');
      redirect('c_transaksi/lihat_lot_for_lot');
    }

    public function lihat_lot_for_lot(){
         if(!empty($this->session->userdata('level'))){
      
      $this->db->select('a.no_lot, jumlah_lot, b.no_target, nama_bb, b.bulan,b.tahun, hasil_lot, satuan');
      $this->db->from('lot_for_lot a');
      $this->db->join('target_proyeksi b', 'a.no_target = b.no_target');
      $this->db->join('bahan_baku c', 'b.no_bb = c.no_bb');
      $data['result']=$this->db->get()->result_array();
      $this->template->load('template','v_lot_for_lot',$data);
      }else{
      redirect('c_login/home');
    }
    }


    //transaksinya
    public function view_trans(){
         if(!empty($this->session->userdata('level'))){
    if(isset($_POST['no_bb'])){
       $no = $_POST['no_bb'];
       $awal = $_POST['tgl_awal'];
       $akhir = $_POST['tgl_akhir'];
        $data['no'] = $no;
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
       $this->db->where('no_bb', $no);
        $data['bahan_baku1'] = $this->db->get('bahan_baku')->row_array();
        $data['bahan_baku'] = $this->db->get('bahan_baku')->result_array();
        // $this->db->where('a.no_bb', $no);
        // $this->db->select('a.tgl_trans, a.id_trans, nama_bb, a.no_bb, a.unit, a.total, b.jumlah,b.subtotal as subtotal_pmb, b.diskon, c.jumlah_bahan_baku, c.harga_satuan, c.subtotal as subtotal_pmk, c.no_pemakaian_bb');
        // $this->db->from('kartu_stok a');
        // $this->db->join('pembelian z', 'a.id_trans = z.id_pemb');
        // $this->db->join('detail_pembelian b', 'b.id_pemb = z.id_pemb');
        // $this->db->join('bahan_baku x', 'x.no_bb = b.no_bb');
        // $this->db->join('pemakaian_bahan_baku c', 'c.no_pemakaian_bb = a.id_trans');
         $query1 = "SELECT tgl_trans, id_trans, ifnull(sum(jumlah), '0') as jumlah, ifnull(total_pmb/jumlah, '0') as rata , ifnull(sum(total_pmb),'0') as total_pmb,  ifnull(sum(jumlah_bahan_baku),'0') as jumlah_bahan_baku, ifnull(sum(harga_satuan),'0') as harga_satuan,  ifnull(sum(subtotal_pmk),'0') as subtotal_pmk,  ifnull(sum(unit),'0') as unit,  ifnull(sum(total),'0') as total , ifnull(total/unit, '0') as ratatotal FROM
kartu_stok a 
LEFT JOIN pembelian z ON z.id_pemb = a.id_trans
left JOIN detail_pembelian b ON b.id_pemb = a.id_trans
RIGHT JOIN bahan_baku x ON x.no_bb = a.no_bb
LEFT JOIN pemakaian_bahan_baku c ON c.no_pemakaian_bb = a.id_trans

WHERE a.no_bb = '$no' AND tgl_trans >= '$awal' AND tgl_trans <= '$akhir'
GROUP BY a.no";

        $data['result'] = $this->db->query($query1)->result_array();
        $this->template->load('template','view_pemb',$data);
      }else{
        $no = 'BB_001';
      
        $this->db->where('no_bb', $no);
        $data['bahan_baku1'] = $this->db->get('bahan_baku')->row_array();
        $data['bahan_baku'] = $this->db->get('bahan_baku')->result_array();
        //  $this->db->where('a.no_bb', $no);
        // $this->db->select('a.tgl_trans, a.id_trans, nama_bb, a.no_bb, a.unit, a.total, b.jumlah,b.subtotal, b.diskon, c.jumlah_bahan_baku, c.harga_satuan, c.subtotal, c.no_pemakaian_bb');
        // $this->db->from('kartu_stok a');
        // $this->db->join('pembelian z', 'a.id_trans = z.id_pemb');
        // $this->db->join('detail_pembelian b', 'b.id_pemb = z.id_pemb');
        // $this->db->join('bahan_baku x', 'x.no_bb = b.no_bb');
        // $this->db->join('pemakaian_bahan_baku c', 'c.no_pemakaian_bb = a.id_trans');
                // $data['result'] = $this->db->get()->result_array();
        $query1 = "SELECT tgl_trans, id_trans, ifnull(sum(jumlah), '0') as jumlah, ifnull(total_pmb/jumlah, '0') as rata , ifnull(sum(total_pmb),'0') as total_pmb,  ifnull(sum(jumlah_bahan_baku),'0') as jumlah_bahan_baku, ifnull(sum(harga_satuan),'0') as harga_satuan,  ifnull(sum(subtotal_pmk),'0') as subtotal_pmk,  ifnull(sum(unit),'0') as unit,  ifnull(sum(total),'0') as total , ifnull(total/unit, '0') as ratatotal FROM
kartu_stok a 
LEFT JOIN pembelian z ON z.id_pemb = a.id_trans
left JOIN detail_pembelian b ON b.id_pemb = a.id_trans
RIGHT JOIN bahan_baku x ON x.no_bb = a.no_bb
LEFT JOIN pemakaian_bahan_baku c ON c.no_pemakaian_bb = a.id_trans

WHERE a.no_bb = 'BB_001'
GROUP BY a.no";
        $data['result'] = $this->db->query($query1)->result_array();
        $this->template->load('template','view_pemb',$data);
      }

    }else{
      redirect('c_login/home');
    }
    }

    

   public function form_pemb1(){
       if(!empty($this->session->userdata('level'))){
    

      $this->db->select('a.no_lot, jumlah_lot, b.no_target, nama_bb, b.bulan,stok,b.tahun, hasil_lot, jumlah_kapasitas_gudang');
      $this->db->from('lot_for_lot a');
      $this->db->join('target_proyeksi b', 'a.no_target = b.no_target');
      $this->db->join('bahan_baku c', 'b.no_bb = c.no_bb');
      $this->db->join('kapasitas_gudang d', 'c.no_bb = d.no_bb');
      $data['result']=$this->db->get()->result_array();


       $this->template->load('template','form_pemb1',$data);
     
    }else{
      redirect('c_login/home');
    }
   }


  public function view_pemb_pdf($awal, $akhir, $no){
     $this->db->where('no_bb', $no);
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $data['bahan_baku1'] = $this->db->get('bahan_baku')->row_array();
        $data['bahan_baku'] = $this->db->get('bahan_baku')->result_array();
       
         $query1 = "SELECT tgl_trans, id_trans, ifnull(sum(jumlah), '0') as jumlah, ifnull(total_pmb/jumlah, '0') as rata , ifnull(sum(total_pmb),'0') as total_pmb,  ifnull(sum(jumlah_bahan_baku),'0') as jumlah_bahan_baku, ifnull(sum(harga_satuan),'0') as harga_satuan,  ifnull(sum(subtotal_pmk),'0') as subtotal_pmk,  ifnull(sum(unit),'0') as unit,  ifnull(sum(total),'0') as total , ifnull(total/unit, '0') as ratatotal FROM
kartu_stok a 
LEFT JOIN pembelian z ON z.id_pemb = a.id_trans
left JOIN detail_pembelian b ON b.id_pemb = a.id_trans
RIGHT JOIN bahan_baku x ON x.no_bb = a.no_bb
LEFT JOIN pemakaian_bahan_baku c ON c.no_pemakaian_bb = a.id_trans

WHERE a.no_bb = '$no' AND tgl_trans >= '$awal' AND tgl_trans <= '$akhir'
GROUP BY a.no";

        $data['result'] = $this->db->query($query1)->result_array();
    $this->template->load('template_pdf','view_pemb_pdf', $data);
    //var_dump($awal);
  }

  
  public function view_pemb_excel($awal, $akhir,$no){
    header("Content-type=application/vnd.ms.excel");
    header("Content-disposition: attachment; filename=Kartu Persediaan.xls");
     $this->db->where('no_bb', $no);
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $data['bahan_baku1'] = $this->db->get('bahan_baku')->row_array();
        $data['bahan_baku'] = $this->db->get('bahan_baku')->result_array();
       
         $query1 = "SELECT tgl_trans, id_trans, ifnull(sum(jumlah), '0') as jumlah, ifnull(total_pmb/jumlah, '0') as rata , ifnull(sum(total_pmb),'0') as total_pmb,  ifnull(sum(jumlah_bahan_baku),'0') as jumlah_bahan_baku, ifnull(sum(harga_satuan),'0') as harga_satuan,  ifnull(sum(subtotal_pmk),'0') as subtotal_pmk,  ifnull(sum(unit),'0') as unit,  ifnull(sum(total),'0') as total , ifnull(total/unit, '0') as ratatotal FROM
kartu_stok a 
LEFT JOIN pembelian z ON z.id_pemb = a.id_trans
left JOIN detail_pembelian b ON b.id_pemb = a.id_trans
RIGHT JOIN bahan_baku x ON x.no_bb = a.no_bb
LEFT JOIN pemakaian_bahan_baku c ON c.no_pemakaian_bb = a.id_trans

WHERE a.no_bb = '$no' AND tgl_trans >= '$awal' AND tgl_trans <= '$akhir'
GROUP BY a.no";

        $data['result'] = $this->db->query($query1)->result_array();
   // $this->template->load('template_pdf','view_pemb_pdf', $data);
    $this->load->view('view_pemb_excel',$data);
    //$this->template->load('template','laporan_penj',$data);
  }

   public function form_pemb($id){
       if(!empty($this->session->userdata('level'))){
    
    
     $query1 = "SELECT  MAX(RIGHT(id_pemb,3)) as kode FROM pembelian";
      $abc = $this->db->query($query1);
      $no_trans = "";
      if($abc->num_rows()>0){
            foreach($abc->result() as $k){
              $tmp = ((int)$k->kode)+1;
              $kd = sprintf("%03s", $tmp);
            }
          }else{
            $kd = "001";
          }
      $no_trans = "PMB_".$kd;
    $data['no_transaksi'] =$no_trans;
     $no_lot = $id;
    $data['no_lot'] = $id;
    $query = "SELECT no_lot, hasil_lot,b.no_bb, nama_bb, harga, jumlah, harga*jumlah as total
              FROM lot_for_lot as a
              JOIN target_proyeksi as b
              ON a.no_target = b.no_target
              JOIN bahan_baku as c
              ON c.no_bb = b.no_bb
              WHERE no_lot = '$no_lot'";
    $abc = $this->db->query($query)->result_array();
    $data['abc'] = $abc;

    $this->db->select('a.no_bb');
    $this->db->from('bahan_baku a');
    $this->db->join('target_proyeksi b', 'a.no_bb = b.no_bb');
    $this->db->join('lot_for_lot c', 'b.no_target = c.no_target');
    $this->db->where('c.no_lot', $id);
    $data['no_bb'] = $this->db->get()->row()->no_bb;

    $this->db->select('c.hasil_lot');
    $this->db->from('target_proyeksi b');
    $this->db->join('lot_for_lot c', 'b.no_target = c.no_target');
    $this->db->where('c.no_lot', $id);
    $data['hasil_lot'] = $this->db->get()->row()->hasil_lot;

    $this->db->select('a.no_diskon, b.no_supplier, nama_supplier, presentase_diskon, keterangan_diskon, status, jumlah_barang');
    $this->db->from('diskon a');
    $this->db->join('detail_diskon b', 'a.no_diskon = b.no_diskon');
    $this->db->join('supplier c', 'b.no_supplier = c.no_supplier');
    $this->db->where('c.no_bb', $data['no_bb']);
    $this->db->where('jumlah_barang <', $data['hasil_lot']);
    $this->db->order_by('presentase_diskon DESC');
    $data['result']= $this->db->get()->result_array();
    $this->template->load('template', 'form_pemb', $data);
    }else{
      redirect('c_login/home');
    }
}
  
  public function form_pemb2(){
    if(!empty($this->session->userdata('level'))){
   
    $data['no_transaksi'] = $_POST['no_transaksi'];
    //no_lot
    $data['no_lot'] = $_POST['no_lot'];
    //no_bb
    $data['no_bb'] = $_POST['no_bb'];
      $no_lot = $_POST['no_lot'];
   
    
    $data['hasil_lot'] = $_POST['jumlah'];
 $query = "SELECT no_lot, hasil_lot,b.no_bb, nama_bb, harga, jumlah, harga*jumlah as total
              FROM lot_for_lot as a
              JOIN target_proyeksi as b
              ON a.no_target = b.no_target
              JOIN bahan_baku as c
              ON c.no_bb = b.no_bb
              WHERE no_lot = '$no_lot'";
    $abc = $this->db->query($query)->result_array();
    $data['abc'] = $abc;
    //suppliernye
    $this->db->select('nama_supplier, a.no_supplier');
    $this->db->from('supplier a');
    $this->db->join('detail_diskon b', 'a.no_supplier = b.no_supplier');

    $this->db->where('b.no_supplier', $_POST['no_supplier']);
    $data['result']= $this->db->get()->row_array();

    //diskonnye
     $this->db->select('presentase_diskon');
    $this->db->from('detail_diskon');
    $this->db->where('no_supplier', $_POST['no_supplier']);
    $data['diskon']= $this->db->get()->row()->presentase_diskon;

    //harga satuan coy
    $this->db->where('no_bb', $data['no_bb']);
    $data['harga_satuan'] = $this->db->get('bahan_baku')->row()->harga;
    $data['subtotal']=$data['hasil_lot'] * $data['harga_satuan'];

    //pengurang di lotforlotnya
    $this->template->load('template', 'form_pemb2', $data);
  }

}

 //  public function form_pemb2(){

 //     if(!empty($this->session->userdata('level'))){
 //    //no_trans
    
 //    $data['no_transaksi'] = $_POST['no_transaksi'];
 //    //no_lot
 //    $data['no_lot'] = $_POST['no_lot'];
 //    //no_bb
 //    $data['no_bb'] = $_POST['no_bb'];
   
 //    $this->db->where('no_bb', $_POST['no_bb']);
 //    $cek = $this->db->get('bahan_baku')->row()->stok;
 //    $cek1 = $_POST['jumlah'] + $cek;
 //    $this->db->where('no_bb', $_POST['no_bb']);
 //    $cek2 = $this->db->get('kapasitas_gudang')->row()->jumlah_kapasitas_gudang;
 //    if($cek1 <=  $cek2){
 //    $no_lot = $_POST['no_lot'];
 //    $data['hasil_lot'] = $_POST['jumlah'];
 // $query = "SELECT no_lot, hasil_lot,b.no_bb, nama_bb, harga, jumlah, harga*jumlah as total
 //              FROM lot_for_lot as a
 //              JOIN target_proyeksi as b
 //              ON a.no_target = b.no_target
 //              JOIN bahan_baku as c
 //              ON c.no_bb = b.no_bb
 //              WHERE no_lot = '$no_lot'";
 //    $abc = $this->db->query($query)->result_array();
 //    $data['abc'] = $abc;
 //    //suppliernye
 //    $this->db->select('nama_supplier, a.no_supplier');
 //    $this->db->from('supplier a');
 //    $this->db->join('detail_diskon b', 'a.no_supplier = b.no_supplier');

 //    $this->db->where('b.no_supplier', $_POST['no_supplier']);
 //    $data['result']= $this->db->get()->row_array();

 //    //diskonnye
 //     $this->db->select('presentase_diskon');
 //    $this->db->from('detail_diskon');
 //    $this->db->where('no_supplier', $_POST['no_supplier']);
 //    $data['diskon']= $this->db->get()->row()->presentase_diskon;

 //    //harga satuan coy
 //    $this->db->where('no_bb', $data['no_bb']);
 //    $data['harga_satuan'] = $this->db->get('bahan_baku')->row()->harga;
 //    $data['subtotal']=$data['hasil_lot'] * $data['harga_satuan'];

 //    //pengurang di lotforlotnya
 //    $this->template->load('template', 'form_pemb2', $data);
 //  }else{
 //    //  $query1 = "SELECT  MAX(RIGHT(id_pemb,3)) as kode FROM pembelian";
 //    //   $abc = $this->db->query($query1);
 //    //   $no_trans = "";
 //    //   if($abc->num_rows()>0){
 //    //         foreach($abc->result() as $k){
 //    //           $tmp = ((int)$k->kode)+1;
 //    //           $kd = sprintf("%03s", $tmp);
 //    //         }
 //    //       }else{
 //    //         $kd = "001";
 //    //       }
 //    //   $no_trans = "PMB_".$kd;
 //    // $data['no_transaksi'] =$no_trans;
 //    //  $no_lot = $id;
 //    // $data['no_lot'] = $id;
 //    // $query = "SELECT no_lot, hasil_lot,b.no_bb, nama_bb, harga, jumlah, harga*jumlah as total
 //    //           FROM lot_for_lot as a
 //    //           JOIN target_proyeksi as b
 //    //           ON a.no_target = b.no_target
 //    //           JOIN bahan_baku as c
 //    //           ON c.no_bb = b.no_bb
 //    //           WHERE no_lot = '$no_lot'";
 //    // $abc = $this->db->query($query)->result_array();
 //    // $data['abc'] = $abc;

 //    // $this->db->select('a.no_bb');
 //    // $this->db->from('bahan_baku a');
 //    // $this->db->join('target_proyeksi b', 'a.no_bb = b.no_bb');
 //    // $this->db->join('lot_for_lot c', 'b.no_target = c.no_target');
 //    // $this->db->where('c.no_lot', $id);
 //    // $data['no_bb'] = $this->db->get()->row()->no_bb;

 //    // $this->db->select('c.hasil_lot');
 //    // $this->db->from('target_proyeksi b');
 //    // $this->db->join('lot_for_lot c', 'b.no_target = c.no_target');
 //    // $this->db->where('c.no_lot', $id);
 //    // $data['hasil_lot'] = $this->db->get()->row()->hasil_lot;

 //    // $this->db->select('a.no_diskon, b.no_supplier, nama_supplier, presentase_diskon, keterangan_diskon, status, jumlah_barang');
 //    // $this->db->from('diskon a');
 //    // $this->db->join('detail_diskon b', 'a.no_diskon = b.no_diskon');
 //    // $this->db->join('supplier c', 'b.no_supplier = c.no_supplier');
 //    // $this->db->where('c.no_bb', $data['no_bb']);
 //    // $this->db->where('jumlah_barang <', $data['hasil_lot']);
 //    // $this->db->order_by('presentase_diskon DESC');

 //    //   $data['error'] = 'Pembelian melebihi stok gudang, silahkan melakukan pembelian kembali!';
 //    // $data['result']= $this->db->get()->result_array();
 //    // $this->template->load('template', 'form_pemb', $data);




 //     $this->db->select('a.no_lot, jumlah_lot, b.no_target, nama_bb, b.bulan,stok,b.tahun, hasil_lot, jumlah_kapasitas_gudang');
 //      $this->db->from('lot_for_lot a');
 //      $this->db->join('target_proyeksi b', 'a.no_target = b.no_target');
 //      $this->db->join('bahan_baku c', 'b.no_bb = c.no_bb');
 //      $this->db->join('kapasitas_gudang d', 'c.no_bb = d.no_bb');
 //      $data['result']=$this->db->get()->result_array();

 //      $data['error'] = 'Pembelian melebihi stok gudang, silahkan melakukan pembelian kembali!';
 //       $this->template->load('template','form_pemb1',$data);
 //  }

 //     }else{
 //      redirect('c_login/home');
 //    }
    
 //        }

      

  
  public function selesai(){
       if(!empty($this->session->userdata('level'))){
    
    
      //setting data yg akan diinput
      // $id = $_POST['no_transaksi'];
      $this->db->where('no_bb', $_POST['no_bb']);
      $cek123 = $this->db->get('bahan_baku')->row()->stok;
        //if($_POST['jumlah'] <= $cek123){
      $nominal = 0;
      $nominal = $_POST['total'];
      $id = $_POST['no_transaksi'];
      $input = array('id_pemb' => $_POST['no_transaksi'],
                     'tgl_pemb' => date('Y-m-d'),
                      'total_pmb' => $nominal,
                      'status' => 'Selesai');
      $this->db->insert('pembelian', $input);

      //input ke transaksi
      $input5 = array('no_trans' => $_POST['no_transaksi'],
                      'tgl_trans' => date('Y-m-d'),
                      'total_trans' => $nominal);
      $this->db->insert('transaksi', $input5);

      $input2 = array('id_pemb' =>$_POST['no_transaksi'],
                      'no_lot' =>$_POST['no_lot']);
      $this->db->insert('detail_lot', $input2);

      $input3 = array('id_pemb' => $_POST['no_transaksi'],
                      'no_bb' => $_POST['no_bb'],
                      'no_supplier' => $_POST['no_supplier'],
                      'jumlah' => $_POST['jumlah'],
                      'diskon' => $_POST['diskon'],
                      'subtotal' => $_POST['subtotal']);
      $this->db->insert('detail_pembelian', $input3);

      //update master data bahan baku
      $this->db->set('stok', "stok +".$_POST['jumlah']."",FALSE);
      $this->db->where('no_bb', $_POST['no_bb']);
      $this->db->update('bahan_baku');

      //update lotforlot
      $no = 1;
      $this->db->set('jumlah_lot', "jumlah_lot -".$no."",FALSE);
      $this->db->where('no_lot', $_POST['no_lot']);
      $this->db->update('lot_for_lot');


      $this->db->where('no_bb', $_POST['no_bb']);
      $namabb = $this->db->get('bahan_baku')->row()->nama_bb;
      //BUAT PEMAKAIAN
      $cekakun = "BDP - Biaya ".$namabb;
      $this->db->where('nama_coa', $cekakun);
      $noakun1 = $this->db->get('coa')->row()->no_coa;
      //BUAT PEMBELIAN
      $cekakun = "Persediaan ".$namabb;
      $this->db->where('nama_coa', $cekakun);
      $noakun2 = $this->db->get('coa')->row()->no_coa;
      //INPUT JURNAL
      $this->m_keuangan->GenerateJurnal($noakun2, $id, 'd', $nominal);
      $this->m_keuangan->GenerateJurnal('111', $id, 'k', $nominal);
       $this->m_keuangan->GenerateJurnal('511', $id, 'd', 20000);
       $this->m_keuangan->GenerateJurnal('111', $id, 'k', 20000);
      
      // INPUT SALDO KE KARTU STOKNYA COY
       $bb = $_POST['no_bb'];
       $query1 = "SELECT * FROM kartu_stok
                  WHERE no IN (SELECT MAX(no) FROM kartu_stok WHERE no_bb = '$bb')";

      $cekunit = $this->db->query($query1)->row()->unit;
      $cektotal = $this->db->query($query1)->row()->total;
      $unit = $cekunit + $_POST['jumlah'];
      $total = $cektotal + $nominal;
      $input = array('id_trans' => $_POST['no_transaksi'],
                    'tgl_trans' => date('Y-m-d'),
                    'no_bb' => $_POST['no_bb'],
                    'unit' => $unit,
                    'total' => $total);
      $this->db->insert('kartu_stok', $input);
      redirect('c_transaksi/view_trans');
    // }else{
    //   redirect()
    // }
      }else{
      redirect('c_login/home');
    }
    
        }

    // public function detail_pmb($id){
    //   $this->db->where('id_pemb', $id);
    //   $data['tgl'] = $this->db->get('pembelian')->row()->tgl_pemb;
    //   $this->db->where('id_pemb', $id);
    //   $data['id'] = $this->db->get('pembelian')->row()->id_pemb;
    //   $this->db->where('id_pemb', $id);
    //   $this->db->select('id_pemb, nama_bb, jumlah, diskon, total, harga');
    //   $this->db->from('detail_pembelian a');
    //   $this->db->join('bahan_baku b', 'a.no_bb = b.no_bb');
    //   $data['result'] = $this->db->get()->result_array();
    //   $this->template->load('template', 'detail_pembelian', $data);

    // }

    // public function test_detail_pmb(){
    //   $this->db->select('tgl_pemb, nama_bb, harga, jumlah, diskon, c.total, c.id_pemb, satuan');
    //   $this->db->from('detail_pembelian a');
    //   $this->db->join('bahan_baku b', 'a.no_bb = b.no_bb');
    //   $this->db->join('pembelian c', 'c.id_pemb = a.id_pemb');
    //   $data['result'] = $this->db->get()->result_array();
    //   $this->template->load('template', 'detail_pembelian_test', $data);
    // }

    // public function view_pemakaian(){
    //      if(!empty($this->session->userdata('level'))){
    
    //   $this->db->from('pemakaian_bahan_baku a');
    //   $this->db->join('bahan_baku b','a.no_bb = b.no_bb');
    //   $this->db->group_by('no_pemakaian_bb');
    //   $data['result'] = $this->db->get()->result_array();
    //   $this->template->load('template','v_pemakaian',$data);
    //   }else{
    //   redirect('c_login/home');
    // }
    // }

    public function form_pemakaian(){
         if(!empty($this->session->userdata('level'))){
        $query1 = "SELECT  MAX(RIGHT(no_pemakaian_bb,3)) as kode FROM pemakaian_bahan_baku";
      $abc = $this->db->query($query1);
      $no_trans = "";
      if($abc->num_rows()>0){
            foreach($abc->result() as $k){
              $tmp = ((int)$k->kode)+1;
              $kd = sprintf("%03s", $tmp);
            }
          }else{
            $kd = "001";
          }
      $no_trans = "PMK_".$kd;
      $data['no_transaksi'] = $no_trans;
      $query = "SELECT a.no_bb, nama_bb, unit, total, total / unit as rata, stok, satuan
                FROM kartu_stok a 
                JOIN bahan_baku b ON a.no_bb = b.no_bb
                WHERE total/unit != 0 AND no IN (SELECT MAX(no) FROM kartu_stok  GROUP BY no_bb)
               ";
      $data['bahan_baku'] = $this->db->query($query)->result_array();
      $data['cek'] = $this->db->query($query)->num_rows();
      $this->template->load('template','f_pemakaian',$data);
      }else{
      redirect('c_login/home');
    } 
    }

    public function tambah_pemakaian(){
         if(!empty($this->session->userdata('level'))){
     $config = array(
            
           
            array(
                'field' => 'no_bb',
                'label' => 'Nama Bahan Baku',
                'rules' => 'required',
                'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                )
            ),
      array(
                'field' => 'jumlah_bahan_baku',
                'label' => 'Jumlah Bahan Baku',
                'rules' => 'required|min_length[1]|max_length[4]|is_natural_no_zero',
                'errors' => array(
                   'required' => '%s tidak boleh kosong!', 
                   'is_natural_no_zero' => '%s tidak boleh minus!',
                   'min_length' => '%s minimal 1 huruf!',
                    'max_length' => '%s maksimal 4 huruf!',
                )
            )
        );
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE){
            $this->form_pemakaian();
        }else{
          //INPUT KE KARTU STOK COY
    $bb = $_POST['no_bb'];
     
    


      //
      $this->db->where('no_bb', $_POST['no_bb']);
      $cek = $this->db->get('bahan_baku')->row()->stok;
      $data['cek'] = $cek;
      if($cek >= $_POST['jumlah_bahan_baku']){
          $query1 = "SELECT * FROM kartu_stok
                  WHERE no IN (SELECT MAX(no) FROM kartu_stok WHERE no_bb = '$bb')";
      $cekunit = $this->db->query($query1)->row()->unit;
      $cektotal = $this->db->query($query1)->row()->total;
      $rata = $cektotal / $cekunit;
      $subtotal = $rata * $_POST['jumlah_bahan_baku'];
      $unit = 0;
      $unit = $cekunit - $_POST['jumlah_bahan_baku'];
      $total = $cektotal - $subtotal;
          $input = array('id_trans' => $_POST['no_pemakaian_bb'],
                    'tgl_trans' => date('Y-m-d'),
                    'no_bb' => $_POST['no_bb'],
                    'unit' => $unit,
                    'total' => $total);
      $this->db->insert('kartu_stok', $input);
      $input = array('no_pemakaian_bb' => $_POST['no_pemakaian_bb'],
                    'no_bb' => $_POST['no_bb'],
                    'jumlah_bahan_baku' => $_POST['jumlah_bahan_baku'],
                    'tgl_pemakaian_bb' => date('Y-m-d'),
                    'harga_satuan'=> $rata,
                    'subtotal_pmk' => $subtotal);
      $this->db->insert('pemakaian_bahan_baku', $input);

      //update stok bahan baku
      $this->db->set('stok', "stok -".$_POST['jumlah_bahan_baku']."",FALSE);
      $this->db->where('no_bb', $_POST['no_bb']);
      $this->db->update('bahan_baku');

      $nominal = $rata * $_POST['jumlah_bahan_baku'];
      $bebanpenyimpanan = 500 * $_POST['jumlah_bahan_baku'];
    

      $id = $_POST['no_pemakaian_bb'];

      $this->db->where('no_bb', $_POST['no_bb']);
      $namabb = $this->db->get('bahan_baku')->row()->nama_bb;
      //BUAT PEMAKAIAN
      $cekakun = "BDP - Biaya ".$namabb;
      $this->db->where('nama_coa', $cekakun);
      $noakun1 = $this->db->get('coa')->row()->no_coa;
      //BUAT PEMBELIAN
      $cekakun = "Persediaan ".$namabb;
      $this->db->where('nama_coa', $cekakun);
      $noakun2 = $this->db->get('coa')->row()->no_coa;
      //INPUT JURNAL
      $this->m_keuangan->GenerateJurnal($noakun1 , $id, 'd', $nominal);
    $this->m_keuangan->GenerateJurnal($noakun2 , $id, 'k', $nominal);
    $this->m_keuangan->GenerateJurnal('512', $id, 'd', $bebanpenyimpanan);
    $this->m_keuangan->GenerateJurnal('111', $id, 'k', $bebanpenyimpanan);
    

    // $cek = substr($data['no_bb'],0,3);
    
      redirect('c_transaksi/view_trans');
    }else{
        $query1 = "SELECT  MAX(RIGHT(no_pemakaian_bb,3)) as kode FROM pemakaian_bahan_baku";
      $abc = $this->db->query($query1);
      $no_trans = "";
      if($abc->num_rows()>0){
            foreach($abc->result() as $k){
              $tmp = ((int)$k->kode)+1;
              $kd = sprintf("%03s", $tmp);
            }
          }else{
            $kd = "001";
          }
      $no_trans = "PMK_".$kd;
      $data['no_transaksi'] = $no_trans;
      $query = "SELECT a.no_bb, nama_bb, unit, total, total / unit as rata, stok, satuan
                FROM kartu_stok a 
                JOIN bahan_baku b ON a.no_bb = b.no_bb
                WHERE total/unit != 0 AND no IN (SELECT MAX(no) FROM kartu_stok  GROUP BY no_bb)
               ";
      $data['bahan_baku'] = $this->db->query($query)->result_array();
      $data['cek'] = $this->db->query($query)->num_rows();
      $data['error'] = 'Jumlah pemakaian bahan baku melebihi stok!';
      $this->template->load('template','f_pemakaian',$data);
    }

      }
    
    }else{
      redirect('c_login/home');
    }
    }

    public function customAlpha($str){
     return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
  }
  
    
 /*
  public function lihatdetail(){

        $id=  $this->uri->segment(3);
    $data['detail'] = $this->m_transaksi_penjualan->GetDataDetailTransaksi($id);
    $this->template->load('template','view_detail_penjualan', $data);
  }
  
  */
 }