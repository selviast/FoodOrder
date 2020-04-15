<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller 
{
    public $data;
    public $pesanan;
    
    
    public function __construct()
    {        
        
        parent::__construct();     
        $this->load->model('m_invoice');                                 

    }
   
    public function index()
    {
        $no_transaksi = $this->session->userdata('no_transaksi');
        $data['pesanan'] = $this->db->query("select count(no_transaksi) from transaksi where no_transaksi='$no_transaksi'")->row_array();
        
        $data['makanan'] =  $this->m_food->viewDataMakanan()->result_array();        

        $this->load->view('templates/main_navbar', $data);
        $this->load->view('shop', $data);
        $this->load->view('templates/main_footer');
    }

    public function indexMinuman()
    {     
        $no_transaksi = $this->session->userdata('no_transaksi');
        $data['pesanan'] = $this->db->query("select count(no_transaksi) from transaksi where no_transaksi='$no_transaksi'")->row_array();
        $data['minuman'] =  $this->m_food->viewDataMinuman()->result_array();
        $this->load->view('templates/main_navbar', $data);
        $this->load->view('shop_drink', $data);
        $this->load->view('templates/main_footer');
    }

    public function cart()
    {        
        $no_transaksi = $this->session->userdata('no_transaksi');
        print_r($nama_pesanan = $this->input->post('nama_pesanan'));

        $data['totalPesanX'] = $this->db->query("select COUNT(nama_pesanan) from transaksi join pesanan on id_pesanan=pesanan_id where no_transaksi='$no_transaksi' AND nama_pesanan='$nama_pesanan'")->row_array();

        $data['pesanan'] = $this->db->query("select count(no_transaksi) from transaksi where no_transaksi='$no_transaksi'")->row_array();
        $data ['totalPesanan'] = $this->db->query(" select DISTINCT id_pesanan, nama_pesanan, pesanan.harga as 'total_harga', sum(transaksi.jumlah) as 'total_jumlah', gambar from transaksi join pesanan on id_pesanan=pesanan_id where no_transaksi='$no_transaksi' group by nama_pesanan;
        ")->result_array();
        
        $data ['totalHarga'] = $this->db->query("select sum(harga) from transaksi join pesanan on id_pesanan=pesanan_id where no_transaksi='$no_transaksi'"
        )->row_array();
        
        $this->load->view('templates/main_navbar', $data);
        $this->load->view('cart', $data);
        $this->load->view('templates/main_footer');
    }

    public function tambahPesananMakanan($id_pesanan)
    {        
        $no_transaksi = $this->session->userdata('no_transaksi');
        $data['pesanan'] = $this->db->query("select count(no_transaksi) from transaksi where no_transaksi='$no_transaksi'")->row_array();
        $data = [
            'no_transaksi' => $this->session->userdata('no_transaksi'),
            'pesanan_id' => $id_pesanan,                        
            'jumlah' => 1,
            'tgl_pesanan' => time()

        ];

        $this->m_food->inputData('transaksi', $data);
        redirect('order');
        
    }

    public function checkOut()
    {      
        $no_transaksi = $this->session->userdata('no_transaksi');
        $data ['totalHarga'] = $this->db->query("select sum(harga) from transaksi join pesanan on id_pesanan=pesanan_id where no_transaksi='$no_transaksi'"
        )->row_array();
        $no_transaksi = $this->session->userdata('no_transaksi');  
        $data['pesanan'] = $this->db->query("select count(no_transaksi) from transaksi where no_transaksi='$no_transaksi'")->row_array();
        $data['meja'] = $this->db->query("select * from meja where status_meja='0' order by lantai asc")->result_array();

        $this->load->view('templates/main_navbar', $data);
        $this->load->view('checkout');
        $this->load->view('templates/main_footer');

    }

    public function finalOrder()
    {
        
        $nama = $this->input->post('nama');
        $id_meja = $this->input->post('id_meja');
        $no_transaksi = $this->session->userdata('no_transaksi');
        $data ['totalHarga'] = $this->db->query("select sum(harga) from transaksi join pesanan on id_pesanan=pesanan_id where no_transaksi='$no_transaksi'"
        )->row_array();

        $this->db->set('nama', $nama);
        $this->db->set('id_meja', $id_meja);
        
        $this->db->where('no_transaksi', $no_transaksi);
        $this->db->update('transaksi');  
        
        //set meja
        $this->db->set('status_meja', '1');
        $this->db->where('id_meja', $id_meja);
        $this->db->update('meja');
        
        $this->invoice();
        sleep(1);
        $this->session->unset_userdata('no_transaksi');

        header("Refresh:0; url=../");
       
       
         
        
    }
    public function invoice()
    {

        $no_transaksi = $this->session->userdata('no_transaksi');
        $id_meja = $this->db->query(" select distinct id_meja from transaksi where no_transaksi='$no_transaksi';
        ")->row_array();
        $id_meja = (int)implode($id_meja);

        $data ['totalPesanan'] = $this->db->query("select DISTINCT id_pesanan, nama_pesanan, harga, sum(pesanan.harga) as 'total_harga', sum(transaksi.jumlah) as 'total_jumlah', no_transaksi, nama, tgl_pesanan, nama_meja, lantai from transaksi join pesanan join meja on id_pesanan=pesanan_id and meja.id_meja = transaksi.id_meja where no_transaksi='$no_transaksi' group by nama_pesanan;
        ")->result_array();
        // $data ['totalPesanan'] = $this->db->query("select DISTINCT id_pesanan, nama_pesanan, harga, jumlah, no_transaksi, nama, nama_meja, lantai, tgl_pesanan from transaksi join pesanan join meja on id_pesanan=pesanan_id and id_meja = meja_i where no_transaksi='$no_transaksi';
        // ")->result_array();
        $data ['totalHarga'] = $this->db->query("select sum(harga) AS 'total_harga' from transaksi join pesanan on id_pesanan=pesanan_id where no_transaksi='$no_transaksi'"
        )->row_array();


        $this->db->set('status_meja', 1);

        $this->db->where('id_meja', $id_meja);
        $this->db->update('meja'); 

        
        $this->load->view('invoice', $data);
        // redirect('welcome');
        
        

 
    }

    public function deleteDataPesanan($id_pesanan)
    {
        $no_transaksi = $this->session->userdata('no_transaksi');
        $where = array('id_pesanan' => $id_pesanan);
		$this->db->query("delete from transaksi where no_transaksi = '$no_transaksi' and pesanan_id = '$id_pesanan';
        ");
		redirect('order/cart');
    }

    public function printPDF()
	{
        $this->invoice();
		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('invoice', [], TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
	}
       
}