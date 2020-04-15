<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();        
        if (!$this->session->userdata('email')) {
            redirect('auth');
        } 

    }
    public function index()
    {  

        $where = $this->input->post('cari_invoice');
        $hasil = $this->db->query("select * from transaksi where no_transaksi='$where'")->row_array();
        
        $data['title'] = 'Admin';             
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/templates/footer');

    }

    public function cariInvoice()
    {
        $where = $this->input->post('cari_invoice');
        $data['title'] = "validasi Pembbayaran";
        
        $data['pesanan'] = $this->db->query("select nama, no_transaksi, lantai, nama_meja, tgl_pesanan,sum(harga) 'total_harga' from transaksi join meja join pesanan on transaksi.id_meja = meja.id_meja  where no_transaksi='$where';
        ")->row_array();
     
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar', $data);
        $this->load->view('admin/templates/sidebar',$data);



        $hasil = $this->db->query("select * from transaksi where no_transaksi='$where'")->row_array();
        if ($hasil > 0) {                        
            $this->load->view('admin/invoice', $data);
            
        }else {
            $this->load->view('admin/notfound_invoice', $data);
        }
    }

    public function validInvoice($no_transaksi)
    {       
        print_r($id_meja = $this->db->query(" select distinct id_meja from transaksi where no_transaksi='$no_transaksi';
        ")->row_array());
        $id_meja = (int)implode($id_meja);

        $this->db->set('status_meja', 0);

        $this->db->where('id_meja', $id_meja);
        $this->db->update('meja'); 
        redirect('admin');

    }

    // MENU MAKANAN
    public function makanan()
    {  
        $data['makanan'] = $this->m_food->viewDataMakanan()->result_array();
        $data['title'] = 'Tambah Data Makanan';

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/makanan', $data);
        $this->load->view('admin/templates/footer');

    }

    public function addDataMakanan()
    {
        
        $data = [            
            'nama_pesanan' => htmlspecialchars($this->input->post('nama_pesanan', true)),
            'harga' => htmlspecialchars($this->input->post('harga', true)),            
            'gambar' => $this->_uploadFile(),
            'status' => 'makanan'
        ];        

        
        $this->m_food->inputData('pesanan', $data);
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Menambahkan data</div>');                    
        redirect('admin/makanan');
    }

    public function _uploadFile()
    {      
        $file = $_FILES['gambar']['name'];
        $newName = $this->input->post('nama_pesanan', true);

        if ($file = '') {   
            
        } else {
            $config['upload_path']   = 'assets/upload/gambar';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $newName;

            
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $error = $this->upload->display_errors();
                // menampilkan pesan error
                print_r($error);
            } else{
               return $file =  $this->upload->data('file_name');
            } 
        }
        return $file;    
    }

    public function editData($id_pesanan)
    {
        $where = array('id_pesanan$id_pesanan' => $id_pesanan);
        $data['mahasiswa'] = $this->m_food->editData($where,'makanan')->result_array();
    }

    public function updateData()
    {             
        $id_pesanan = htmlspecialchars($this->input->post('id_pesanan', true));        
        $nama_makanan = htmlspecialchars($this->input->post('nama_pesanan', true));
        $harga_makanan = htmlspecialchars($this->input->post('harga', true));
        $stok = $this->input->post('stok', true);        
        $gambar_makanan = $this->_uploadFile();
        
        $id = $this->input->post('id_pesanan', true);

        $uploadFile = $_FILES['gambar']['name'];
        
        if ($uploadFile) {
            $config['upload_path']   = 'assets/upload/gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $nama_makanan;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar')) {                
                $fileNew = $this->upload->data('file_name');
                $this->db->set('gambar', $fileNew);
            }else {
                $error = $this->upload->display_errors();
            }
        }

     

        $this->db->set('nama_pesanan', $nama_makanan);
        $this->db->set('harga', $harga_makanan);        

        $this->db->where('id_pesanan', $id);
        $this->db->update('pesanan');
     
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengupdate data </div>');                    
        redirect('admin/makanan');
  
    }

    public function deleteData($id_pesanan)
    {
        $where = array('id_pesanan' => $id_pesanan);
		$this->m_food->deleteData($where, 'pesanan');
        redirect('admin/makanan');
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengapus data </div>');                    
    }

    // end Makanan

    // MINUMAN
    public function minuman()
    {  
        $data['minuman'] = $this->m_food->viewDataMinuman()->result_array();
        $data['title'] = 'Tambah Data Minuman';

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/minuman', $data);
        $this->load->view('admin/templates/footer');

    }

    public function addDataMinuman()
    {           
        $data = [            
            'nama_pesanan' => htmlspecialchars($this->input->post('nama_pesanan', true)),
            'harga' => htmlspecialchars($this->input->post('harga', true)),            
            'gambar' => $this->_uploadFile(),
            'status' => 'minuman'
        ];        

        
        $this->m_food->inputData('pesanan', $data);                       
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Menambahkan data</div>');                    
        redirect('admin/minuman');
    }

    public function _uploadFileMinuman()
    {      
        $file = $_FILES['gambar']['name'];
        $newName = $this->input->post('nama_pesanan', true);

        if ($file = '') {   
            
        } else {
            $config['upload_path']   = 'assets/upload/gambar';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $newName;

            
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $error = $this->upload->display_errors();
                // menampilkan pesan error
                print_r($error);
            } else{
               return $file =  $this->upload->data('file_name');
            } 
        }
        return $file;    
    }

    public function editDataMinuman($id_pesanan)
    {
        $where = array('id_pesanan' => $id_pesanan);
        $data['mahasiswa'] = $this->m_food->editData($where,'pesanan')->result_array();
    }

    public function updateDataMinuman()
    {                     
        $id_pesanan = htmlspecialchars($this->input->post('id_pesanan', true));        
        $nama_pesanan = htmlspecialchars($this->input->post('nama_pesanan', true));
        $harga = htmlspecialchars($this->input->post('harga', true));
        $status = htmlspecialchars($this->input->post('status', true));              
        $gambar_minuman = $this->_uploadFile();
        
        $id = $this->input->post('id_pesanan', true);

        $uploadFile = $_FILES['gambar']['name'];
        
        if ($uploadFile) {
            $config['upload_path']   = 'assets/upload/gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $nama_pesanan;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar')) {                
                $fileNew = $this->upload->data('file_name');
                $this->db->set('gambar', $fileNew);
            }else {
                $error = $this->upload->display_errors();
            }
        }

     

        $this->db->set('nama_pesanan', $nama_pesanan);
        $this->db->set('harga', $harga);        

        $this->db->where('id_pesanan', $id);
        $this->db->update('pesanan');
     
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengupdate data </div>');                    
        redirect('admin/minuman');
  
    }

    public function deleteDataMinuman($id_pesanan)
    {
        $where = array('id_pesanan' => $id_pesanan);
		$this->m_food->deleteData($where, 'pesanan');
        redirect('admin/minuman');
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengapus data </div>');                    
    }

    // end minuman

    //MEJA

    public function meja()
    {  
        $data['meja'] = $this->m_food->viewDataMeja()->result_array();
        $data['title'] = 'Tambah Data Meja';

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/meja', $data);
        $this->load->view('admin/templates/footer');

    }

    public function addDataMeja()
    {          
        
        $data = [            
            'nama_meja' => htmlspecialchars($this->input->post('nama_meja', true)),
            'lantai' => htmlspecialchars($this->input->post('lantai', true)),
        ];        

        
        $this->m_food->inputData('meja', $data);
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Menambahkan data</div>');                    
        redirect('admin/meja');
    }

    public function editDataMeja($id_meja)
    {
        $where = array('id_meja' => $id_meja);
        $data['mahasiswa'] = $this->m_food->editData($where,'minuman')->result_array();
    }

    public function updateDataMeja()
    {                     
        $id_meja = htmlspecialchars($this->input->post('id_meja', true));        
        $nama_meja = htmlspecialchars($this->input->post('nama_meja', true));
        $lantai = htmlspecialchars($this->input->post('lantai', true));
        $status = $this->input->post('status', true);                
     

        $this->db->set('nama_meja', $nama_meja);
        $this->db->set('lantai', $lantai);
        $this->db->set('status', $status);

        $this->db->where('id_meja', $id_meja);
        $this->db->update('meja');
     
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengupdate data </div>');                    
        redirect('admin/meja');
  
    }

    public function deleteDataMeja($id_meja)
    {
        $where = array('id_meja' => $id_meja);
		$this->m_food->deleteData($where, 'meja');
        redirect('admin/meja');
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengapus data </div>');                    
    }



}