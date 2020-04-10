<?php
class c_masterdata extends CI_controller
{
   
   //MASTER DATA BAHAN BAKU COYYY
   public function beranda()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $this->template->load('template', 'beranda');
      } else {
         redirect('c_login/home');
      }
   }
   
   public function lihat_bb()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $data['result'] = $this->db->get('bahan_baku')->result_array();
         $this->template->load('template', 'v_bahan_baku', $data);
      } else {
         redirect('c_login/home');
      }
   }
   public function form_bb()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $query1   = "SELECT  MAX(RIGHT(no_bb,3)) as kode FROM bahan_baku";
         $abc      = $this->db->query($query1);
         $no_trans = "";
         if ($abc->num_rows() > 0) {
            foreach ($abc->result() as $k) {
               $tmp = ((int) $k->kode) + 1;
               $kd  = sprintf("%03s", $tmp);
            }
         } else {
            $kd = "001";
         }
         $no_trans   = "BB_" . $kd;
         $data['id'] = $no_trans;
         $this->template->load('template', 'f_bahan_baku', $data);
      } else {
         redirect('c_login/home');
      }
   }
   
   public function tambah_bb()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $config = array(
            
            array(
               'field' => 'nama_bb',
               'label' => 'Nama Bahan Baku',
               'rules' => 'required|callback_customAlpha|min_length[3]|max_length[30]|is_unique[bahan_baku.no_bb]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 3 huruf!',
                  'max_length' => '%s maksimal 30 huruf!',
                  'customAlpha' => '%s hanya boleh berupa huruf!',
                  'is_unique' => '%s sudah ada di database!'
               )
            ),
            array(
               'field' => 'harga',
               'label' => 'Harga',
               'rules' => 'required|is_natural_no_zero|min_length[1]|max_length[11]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'is_natural_no_zero' => '%s hanya berupa angka 1-9!',
                  'min_length' => '%s minimal 3 huruf!',
                  'max_length' => '%s maksimal 30 huruf!'
               )
            ),
            
            array(
               'field' => 'satuan',
               'label' => 'Satuan',
               'rules' => 'required|in_list[Kg,Liter,Gram]',
               'errors' => array(
                  'required' => 'Inputan Salah',
                  'in_list' => 'Inputan Salah'
               )
            )
         );
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
         $this->form_validation->set_rules($config);
         
         if ($this->form_validation->run() == FALSE) {
            $this->form_bb();
         } else {
            $data = array(
               'no_bb' => $_POST['no_bb'],
               'nama_bb' => $_POST['nama_bb'],
               'harga' => $_POST['harga'],
               'stok' => 0,
               'satuan' => $_POST['satuan']
            );
            $this->m_masterdata->tambah_data('bahan_baku', $data);
            
            $query1   = "SELECT  MAX(RIGHT(no_kapasitas_gudang,3)) as kode FROM kapasitas_gudang";
            $abc      = $this->db->query($query1);
            $no_trans = "";
            if ($abc->num_rows() > 0) {
               foreach ($abc->result() as $k) {
                  $tmp = ((int) $k->kode) + 1;
                  $kd  = sprintf("%03s", $tmp);
               }
            } else {
               $kd = "001";
            }
            $no_trans = "KG_" . $kd;
            $data1    = array(
               'no_kapasitas_gudang' => $no_trans,
               'no_bb' => $_POST['no_bb'],
               'jumlah_kapasitas_gudang' => 0
            );
            $this->m_masterdata->tambah_data('kapasitas_gudang', $data1);
            redirect('c_masterdata/lihat_bb');
         }
      } else {
         redirect('c_login/home');
      }
      
   }
   
   public function isi_edit_bb($id)
   {
      if (!empty($this->session->userdata('level'))) {
         
         
         $x['data'] = $this->m_masterdata->edit_data('bahan_baku', "no_bb = '$id'")->row_array();
         $this->template->load('template', 'u_bahan_baku', $x);
      } else {
         redirect('c_login/home');
      }
      
   }
   public function edit_bb()
   {
      if (!empty($this->session->userdata('level'))) {
         $config = array(
            
            array(
               'field' => 'nama_bb',
               'label' => 'Nama Bahan Baku',
               'rules' => 'required|callback_customAlpha|min_length[3]|max_length[30]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 3 huruf!',
                  'max_length' => '%s maksimal 30 huruf!',
                  'customAlpha' => '%s hanya boleh berupa huruf!'
               )
            ),
            array(
               'field' => 'harga',
               'label' => 'Harga',
               'rules' => 'required|is_natural_no_zero|min_length[1]|max_length[11]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'is_natural_no_zero' => '%s hanya berupa angka 1-9!',
                  'min_length' => '%s minimal 3 huruf!',
                  'max_length' => '%s maksimal 30 huruf!'
               )
            ),
            
            array(
               'field' => 'satuan',
               'label' => 'Satuan',
               'rules' => 'required|in_list[Kg,Liter,Gram]',
               'errors' => array(
                  'required' => 'Inputan Salah',
                  'in_list' => 'Inputan Salah'
               )
            )
         );
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
         $this->form_validation->set_rules($config);
         
         if ($this->form_validation->run() == FALSE) {
            $id = $_POST['no_bb'];
            $this->isi_edit_bb($id);
         } else {
            $no_bb   = $_POST['no_bb'];
            $nama_bb = $_POST['nama_bb'];
            $harga   = $_POST['harga'];
            $stok    = $_POST['stok'];
            $satuan  = $_POST['satuan'];
            
            $data = array(
               'nama_bb' => $nama_bb,
               'harga' => $harga,
               'stok' => $stok,
               'satuan' => $satuan
            );
            
            $this->db->where('no_bb', $no_bb);
            $this->m_masterdata->update_data('bahan_baku', $data);
            redirect('c_masterdata/lihat_bb');
            
         }
         
      } else {
         redirect('c_login/home');
      }
   }
   
   //MASTER DATA SUPPLIER COYYY
   public function lihat_supplier()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $sql = "SELECT no_supplier, nama_supplier,nama_bb, alamat, no_hp FROM supplier as a
      JOIN bahan_baku as b
      ON a.no_bb = b.no_bb";
         
         $data['result'] = $this->db->query($sql)->result_array();
         $this->template->load('template', 'v_supplier', $data);
      } else {
         redirect('c_login/home');
      }
   }
   public function form_supplier()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $query1   = "SELECT  MAX(RIGHT(no_supplier,3)) as kode FROM supplier";
         $abc      = $this->db->query($query1);
         $no_trans = "";
         if ($abc->num_rows() > 0) {
            foreach ($abc->result() as $k) {
               $tmp = ((int) $k->kode) + 1;
               $kd  = sprintf("%03s", $tmp);
            }
         } else {
            $kd = "001";
         }
         $no_trans           = "SUPP_" . $kd;
         $data['id']         = $no_trans;
         $data['bahan_baku'] = $this->db->get('bahan_baku')->result_array();
         $this->template->load('template', 'f_supplier', $data);
      } else {
         redirect('c_login/home');
      }
   }
   
   public function tambah_supplier()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $config = array(
            
            array(
               'field' => 'nama_supplier',
               'label' => 'Nama Supplier',
               'rules' => 'required|callback_customAlpha|min_length[3]|max_length[30]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 3 huruf!',
                  'max_length' => '%s maksimal 30 huruf!',
                  'customAlpha' => '%s hanya boleh berupa huruf!'
                  
               )
            ),
            array(
               'field' => 'no_bb',
               'label' => 'Bagian',
               'rules' => 'required',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!'
               )
            ),
            array(
               'field' => 'alamat',
               'label' => 'Alamat',
               'rules' => 'required|min_length[6]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 6 huruf!'
               )
            ),
            array(
               'field' => 'no_hp',
               'label' => 'No HP',
               'rules' => 'required|min_length[10]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 10 huruf!'
               )
            )
         );
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
         $this->form_validation->set_rules($config);
         
         if ($this->form_validation->run() == FALSE) {
            $this->form_supplier();
         } else {
            $data = array(
               'no_supplier' => $_POST['no_supplier'],
               'no_bb' => $_POST['no_bb'],
               'nama_supplier' => $_POST['nama_supplier'],
               'alamat' => $_POST['alamat'],
               'no_hp' => $_POST['no_hp']
            );
            
            $this->m_masterdata->tambah_data('supplier', $data);
            redirect('c_masterdata/lihat_supplier');
         }
      } else {
         redirect('c_login/home');
      }
      
   }
   
   public function isi_edit_supplier($id)
   {
      if (!empty($this->session->userdata('level'))) {
         
         $this->db->select('*');
         $this->db->from('supplier a');
         $this->db->join('bahan_baku b', 'a.no_bb = b.no_bb');
         $this->db->where('no_supplier', $id);
         
         $x['data'] = $this->db->get()->row_array();
         $x['bb']   = $this->db->get('bahan_baku')->result_array();
         $this->template->load('template', 'u_supplier', $x);
      } else {
         redirect('c_login/home');
      }
      
   }
   public function edit_supplier()
   {
      if (!empty($this->session->userdata('level'))) {
         $config = array(
            
            array(
               'field' => 'nama_supplier',
               'label' => 'Nama Supplier',
               'rules' => 'required|callback_customAlpha|min_length[3]|max_length[30]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 3 huruf!',
                  'max_length' => '%s maksimal 30 huruf!',
                  'customAlpha' => '%s hanya boleh berupa huruf!'
               )
            ),
            array(
               'field' => 'alamat',
               'label' => 'Alamat',
               'rules' => 'required|min_length[10]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 10 huruf!'
               )
            ),
            
            array(
               'field' => 'no_hp',
               'label' => 'No HP',
               'rules' => 'required|numeric',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'numeric' => '%s harus berupa angka!'
               )
            )
         );
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
         $this->form_validation->set_rules($config);
         
         if ($this->form_validation->run() == FALSE) {
            $id = $_POST['no_supplier'];
            $this->isi_edit_supplier($id);
         } else {
            $no_supplier   = $_POST['no_supplier'];
            $no_bb         = $_POST['no_bb'];
            $nama_supplier = $_POST['nama_supplier'];
            $alamat        = $_POST['alamat'];
            $no_hp         = $_POST['no_hp'];
            
            $data = array(
               'nama_supplier' => $nama_supplier,
               'alamat' => $alamat,
               'no_hp' => $no_hp
            );
            
            $this->db->where('no_supplier', $no_supplier);
            $this->m_masterdata->update_data('supplier', $data);
            redirect('c_masterdata/lihat_supplier');
         }
      } else {
         redirect('c_login/home');
      }
      
   }
   
   //MASTER DATA COA COYYY
   public function lihat_coa()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $data['result'] = $this->db->get('coa')->result_array();
         $this->template->load('template', 'v_coa', $data);
      } else {
         redirect('c_login/home');
      }
   }
   public function form_coa()
   {
      if (!empty($this->session->userdata('level'))) {
         
         //  $data['bahan_baku'] = $this->db->get('bahan_baku')->result_array();
         $this->template->load('template', 'f_coa');
      } else {
         redirect('c_login/home');
      }
   }
   
   public function tambah_coa()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $config = array(
            
            array(
               'field' => 'no_coa',
               'label' => 'Nomor Akun',
               'rules' => 'required|is_natural|min_length[3]|max_length[11]|is_unique[coa.no_coa]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 3 huruf!',
                  'max_length' => '%s maksimal 11 huruf!',
                  'is_natural' => '%s tidak boleh minus!',
                  'is_unique' => '%s sudah ada didatabase!'
               )
            ),
            array(
               'field' => 'nama_coa',
               'label' => 'Nama Akun',
               'rules' => 'required|min_length[3]|max_length[30]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 3 huruf!',
                  'max_length' => '%s maksimal 30 huruf!'
               )
            ),
            array(
               'field' => 'jenis_coa',
               'label' => 'Jenis Akun',
               'rules' => 'required|min_length[6]|max_length[11]|callback_customAlpha',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 6 huruf!',
                  'max_length' => '%s maksimal 11 huruf!',
                  'customAlpha' => '%s hanya boleh berupa huruf!'
               )
            )
         );
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
         $this->form_validation->set_rules($config);
         
         if ($this->form_validation->run() == FALSE) {
            $this->form_coa();
         } else {
            
            $data = array(
               'no_coa' => $_POST['no_coa'],
               'nama_coa' => $_POST['nama_coa'],
               'jenis_coa' => $_POST['jenis_coa'],
               'saldo_awal' => ''
            );
            
            $this->m_masterdata->tambah_data('coa', $data);
            redirect('c_masterdata/lihat_coa');
         }
      } else {
         redirect('c_login/home');
      }
   }
   
   public function lihat_user()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $data['result'] = $this->db->get('user')->result_array();
         $this->template->load('template', 'v_user', $data);
      } else {
         redirect('c_login/home');
      }
   }
   
   public function form_user()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $this->template->load('template', 'f_user');
      } else {
         redirect('c_login/home');
      }
   }
   public function tambah_user()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $config = array(
            
            array(
               'field' => 'username',
               'label' => 'Username',
               'rules' => 'required|min_length[5]|max_length[30]|is_unique[user.username]',
               'errors' => array(
                  'required' => 'Inputan Salah',
                  'min_length' => 'Inputan Salah',
                  'max_length' => 'Inputan Salah',
                  'is_natural' => 'Inputan Salah',
                  'is_unique' => 'Inputan Salah'
               )
            ),
            array(
               'field' => 'password',
               'label' => 'Password',
               'rules' => 'required|min_length[3]|max_length[100]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 3 huruf!',
                  'max_length' => '%s maksimal 30 huruf!'
               )
            ),
            array(
               'field' => 'level',
               'label' => 'Jabatan',
               'rules' => 'required',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!'
               )
            ),
            array(
               'field' => 'nama_lengkap',
               'label' => 'Nama Lengkap',
               'rules' => 'required|max_length[30]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'max_length' => '%s maksimal 30 huruf!'
               )
            )
         );
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
         $this->form_validation->set_rules($config);
         
         if ($this->form_validation->run() == FALSE) {
            $this->form_user();
         } else {
            $data = array(
               'username' => $_POST['username'],
               'password' => $_POST['password'],
               'level' => $_POST['level'],
               'nama_lengkap' => $_POST['nama_lengkap']
            );
            $this->db->insert('user', $data);
            redirect('c_masterdata/lihat_user');
         }
      } else {
         redirect('c_login/home');
      }
      
   }
   
   public function lihat_gudang()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $this->db->from('kapasitas_gudang a');
         $this->db->join('bahan_baku b', 'a.no_bb = b.no_bb');
         $data['result'] = $this->db->get()->result_array();
         $this->template->load('template', 'v_gudang', $data);
      } else {
         redirect('c_login/home');
      }
   }
   
   /* public function form_gudang(){
   if(!empty($this->session->userdata('level'))){
   
   $query1 = "SELECT  MAX(RIGHT(no_kapasitas_gudang,3)) as kode FROM kapasitas_gudang";
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
   $no_trans = "KG_".$kd;
   $data['id']= $no_trans;
   $data['bb'] = $this->db->get('bahan_baku')->result_array();
   
   $this->template->load('template','f_gudang', $data);
   }else{
   redirect('c_login/home');
   }
   }
   */
   
   public function isi_gudang($id)
   {
      
      $this->db->from('bahan_baku a');
      $this->db->join('kapasitas_gudang b', 'b.no_bb = a.no_bb');
      $this->db->where('no_kapasitas_gudang', $id);
      $data['isi'] = $this->db->get()->row_array();
      $this->template->load('template', 'u_gudang', $data);
   }
   
   public function tambah_gudang()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $config = array(
            
            
            array(
               'field' => 'jumlah_kapasitas_gudang',
               'label' => 'Jumlah Kapasitas Gudang',
               'rules' => 'required|min_length[1]|max_length[11]',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 1 huruf!',
                  'max_length' => '%s maksimal 11 huruf!'
               )
            )
         );
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
         $this->form_validation->set_rules($config);
         
         if ($this->form_validation->run() == FALSE) {
            $id = $_POST['no_kapasitas_gudang'];
            $this->isi_gudang($id);
         } else {
            $data = array(
               'jumlah_kapasitas_gudang' => $_POST['jumlah_kapasitas_gudang']
            );
            $this->db->where('no_kapasitas_gudang', $_POST['no_kapasitas_gudang']);
            $this->m_masterdata->update_data('kapasitas_gudang', $data);
            redirect('c_masterdata/lihat_gudang');
         }
      } else {
         redirect('c_login/home');
         
      }
   }
   
   public function lihat_diskon()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $query          = "SELECT a.no_diskon, nama_bb, nama_supplier, presentase_diskon, jumlah_barang, keterangan_diskon,pilihan_diskon, status
              FROM diskon a
              JOIN detail_diskon b ON a.no_diskon = b.no_diskon
              JOIN supplier c ON c.no_supplier = b.no_supplier
              JOIN bahan_baku d ON d.no_bb = b.no_bb
              GROUP BY a.no_diskon";
         $data['result'] = $this->db->query($query)->result_array();
         
         $this->template->load('template', 'v_diskon', $data);
      } else {
         redirect('c_login/home');
      }
   }
   
   public function form_diskon()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $query1   = "SELECT  MAX(RIGHT(no_diskon,3)) as kode FROM diskon";
         $abc      = $this->db->query($query1);
         $no_trans = "";
         if ($abc->num_rows() > 0) {
            foreach ($abc->result() as $k) {
               $tmp = ((int) $k->kode) + 1;
               $kd  = sprintf("%03s", $tmp);
            }
         } else {
            $kd = "001";
         }
         $no_trans   = "DKN_" . $kd;
         $data['id'] = $no_trans;
         $this->db->from('supplier a');
         $this->db->join('bahan_baku b', 'a.no_bb = b.no_bb');
         $data['supplier'] = $this->db->get()->result_array();
         
         $this->template->load('template', 'f_diskon', $data);
      } else {
         redirect('c_login/home');
      }
      
   }
   
   public function tambah_diskon()
   {
      if (!empty($this->session->userdata('level'))) {
         
         $config = array(
            
            array(
               'field' => 'no_supplier',
               'label' => 'Supplier',
               'rules' => 'required',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!'
               )
            ),
            
            array(
               'field' => 'presentase_diskon',
               'label' => 'Presentase Diskon',
               'rules' => 'required|min_length[1]|is_natural',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 1 huruf!',
                  'is_natural' => '%s tidak boleh minus!'
               )
            ),
            
            
            
            array(
               'field' => 'jumlah_barang',
               'label' => 'Jumlah Barang',
               'rules' => 'required|min_length[1]|max_length[11]|is_natural',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!',
                  'min_length' => '%s minimal 1 huruf!',
                  'max_length' => '%s maksimal 11 huruf!',
                  'is_natural' => '%s tidak boleh minus!'
               )
            ),
            
            
            array(
               'field' => 'keterangan_diskon',
               'label' => 'Keterangan',
               'rules' => 'required',
               'errors' => array(
                  'required' => '%s tidak boleh kosong!'
               )
            )
            
         );
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  ', '</div>');
         $this->form_validation->set_rules($config);
         
         if ($this->form_validation->run() == FALSE) {
            $this->form_diskon();
         } else {
            
            $data1 = array(
               'no_diskon' => $_POST['no_diskon'],
               'keterangan_diskon' => $_POST['keterangan_diskon']
            );
            $this->db->insert('diskon', $data1);
            
            $this->db->where('no_supplier', $_POST['no_supplier']);
            $no_bb = $this->db->get('supplier')->row()->no_bb;
            $data2 = array(
               'no_diskon' => $_POST['no_diskon'],
               'no_bb' => $no_bb,
               'no_supplier' => $_POST['no_supplier'],
               'presentase_diskon' => $_POST['presentase_diskon'],
               'pilihan_diskon' => $_POST['pilihan_diskon'],
               'jumlah_barang' => $_POST['jumlah_barang']
            );
            
            $this->db->insert('detail_diskon', $data2);
            redirect('c_masterdata/lihat_diskon');
            
         }
      } else {
         redirect('c_login/home');
      }
   }
   
   public function status_diskon($id, $no_diskon)
   {
      if ($id == 1) {
         $skor = 0;
      } else {
         $skor = 1;
      }
      $data = array(
         'status' => $skor
      );
      $this->db->where('no_diskon', $no_diskon);
      $this->m_masterdata->update_data('diskon', $data);
      redirect('c_masterdata/lihat_diskon');
   }
   
   
   
   
   /* public function isi_edit_supplier($id){
   
   $x['data']=$this->m_masterdata->edit_data('supplier', "no_coa = '$id'")->row_array();
   $this->template->load('template','u_supplier',$x);
   
   }
   */
   /*
   public function edit_supplier(){
   $no_supplier = $_POST['no_supplier'];
   $no_bb = $_POST['no_bb'];
   $nama_supplier = $_POST['nama_supplier'];
   $alamat = $_POST['alamat'];
   $no_hp  = $_POST['no_hp'];
   
   $data = array(
   'no_bb' => $no_bb,
   'nama_supplier' => $nama_supplier,
   'alamat' => $alamat,
   'no_hp' => $no_hp
   );
   
   $this->db->where('no_supplier', $no_supplier);
   $this->m_masterdata->update_data('supplier',$data);
   redirect('c_masterdata/lihat_supplier');
   
   }
   */
   public function customAlpha($str)
   {
      return (!preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
   }
}