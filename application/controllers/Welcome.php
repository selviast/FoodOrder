<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();     
		$this->load->model('m_invoice'); 
		
		$no_transaksi = $this->session->userdata('no_transaksi');
		if ($this->session->userdata('no_transaksi') != "" ) {
            redirect('order');
        }         
    }	 

	public function index()
	{
		$data = [
			'no_transaksi' => $this->m_invoice->get_no_invoice()			
		];
		$data['pesanan'] = $this->db->query('select count(no_transaksi) from transaksi where no_transaksi=2112190001')->row_array();


		$this->session->set_userdata($data);
		$this->session->userdata; 

		$this->load->view('templates/main_navbar', $data);
        $this->load->view('index', $data);	
		$this->load->view('templates/main_footer');		
	}
}
