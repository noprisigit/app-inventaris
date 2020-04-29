<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if (!$this->session->userdata('username'))
            redirect('auth');
    }

    public function management_komputer()
    {
        $data['title'] = "Management";
        $data['second_title'] = "Management Komputer";
        $this->db->from('master_komputer');
        $this->db->order_by('nama_pc', 'asc');
        $data['data_komputer'] = $this->db->get()->result_array();
        
        $this->load->view('template/header', $data);
        $this->load->view('management/management-komputer', $data);
        $this->load->view('template/footer');
    }

    public function tambah_komputer()
    {
        $this->form_validation->set_rules('nama_pc', 'Nama PC', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('processor', 'Processor', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('ram', 'RAM', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('graphic_card', 'Graphic card', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('penyimpanan', 'Penyimpanan', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = "Management";
            $data['second_title'] = "Tambah Komputer";
            
            $this->load->view('template/header', $data);
            $this->load->view('management/tambah-komputer', $data);
            $this->load->view('template/footer');
        } else {
            $input = [
                'nama_pc'       => $this->input->post('nama_pc'),
                'processor'     => $this->input->post('processor'),
                'ram'           => $this->input->post('ram'),
                'graphic_card'  => $this->input->post('graphic_card'),
                'penyimpanan'   => $this->input->post('penyimpanan'),
                'foto_komputer' => 'komputer.png'
            ];

            $this->db->insert('master_komputer', $input);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5> Data Komputer Berhasil Ditambah.
            </div>');
            redirect('management/management-komputer');
        }
    }

    public function edit_komputer()
    {
        $this->form_validation->set_rules('nama_pc', 'Nama PC', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('processor', 'Processor', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('ram', 'RAM', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('graphic_card', 'Graphic card', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('penyimpanan', 'Penyimpanan', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);

        $id = $this->uri->segment(3);

        if ($this->form_validation->run() == false) {
            $data['title'] = "Management";
            $data['second_title'] = "Edit Komputer";
            $data['komputer'] = $this->db->get_where('master_komputer', ['id_komputer' => $id])->row_array();
    
            $this->load->view('template/header', $data);
            $this->load->view('management/edit-komputer', $data);
            $this->load->view('template/footer');
        } else {
            $foto = $_FILES['foto_komputer']['name'];
            $data = $this->db->get_where('master_komputer', ['id_komputer' => $this->input->post('id_komputer')])->row_array();

            if ($foto) {
                $config['upload_path']          = './assets/dist/img/komputer/';
                $config['allowed_types']        = 'png|jpg|jpeg';
                $config['max_size']             = 5048;
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('foto_komputer')) {
                    $old_image = $data['foto_komputer'];

                    if ($foto != "komputer.png") {
                        unlink(FCPATH . "/assets/dist/img/komputer/" . $old_image);
                    }
                    $foto_komputer = $this->upload->data('file_name');
                    $this->db->set('foto_komputer', $foto_komputer);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_pc', $this->input->post('nama_pc'));
            $this->db->set('processor', $this->input->post('processor'));
            $this->db->set('ram', $this->input->post('ram'));
            $this->db->set('graphic_card', $this->input->post('graphic_card'));
            $this->db->set('penyimpanan', $this->input->post('penyimpanan'));
            $this->db->where('id_komputer', $this->input->post('id_komputer'));

            if ($this->db->update('master_komputer')) {
                echo "berhasil";
            } else {
                echo "gagal";
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5> Data Komputer Berhasil Diperbaharui.
            </div>');
            redirect('management/management-komputer');
        }
    }

    public function delete_komputer($id)
    {
        $foto = $this->db->select('foto_komputer')->get_where('master_komputer', ['id_komputer' => $id])->row_array();
        if ($foto['foto_komputer'] != 'komputer.png') {
            unlink(FCPATH . "/assets/dist/img/komputer/" . $foto['foto_komputer']);
        }
        $this->db->delete('master_komputer', ['id_komputer' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Data Komputer Berhasil Dihapus.
        </div>');
        redirect('management/management-komputer');
    }
}