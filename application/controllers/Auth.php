<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
        
    }
    public function index()
    {
        if($this->session->userdata('email')){
            redirect('admin');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run()== false) {
            $data['title'] = 'Food Order | Login';
            $this->load->view('admin/templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('admin/templates/auth_footer');
       
        }else{
            $this->_login();
        }
        
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //jika user ada
        if ($user) {
            //jika user aktif
            if ($user['is_aktif'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    }else{
                        redirect('user');
                    }
                    
                    
                } else {
                    $this->session->set_flashdata('message','<div id="notif" class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth');
                }


            }else {
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-danger" role="alert">Email belum diaktifasi</div>');
            redirect('auth');
            }

        }else {            
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-danger" role="alert">Email atau password yang anda masukan salah</div>');
            redirect('auth');
        }
    }

    public function logout()
    { 
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Anda berhasil Logout</div>');
        redirect('auth');
    }
}