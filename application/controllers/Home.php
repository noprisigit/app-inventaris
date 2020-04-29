<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        if (!$this->session->userdata('username'))
            redirect('auth');
    }

    public function index() 
    {
        $data['title'] = "Dashboard";
        $data['second_title'] = "Dashboard";

        $data['stok_hardware'] = $this->db->count_all_results('master_stok_hardware');
        $data['stok_atk'] = $this->db->count_all_results('master_stok_atk');
        $data['stok_komputer'] = $this->db->count_all_results('master_komputer');
        // print_r($data['stok_hardware']);
        // exit;

        $this->load->view('template/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
    }
}