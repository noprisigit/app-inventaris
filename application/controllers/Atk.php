<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atk extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if (!$this->session->userdata('username'))
            redirect('auth');
    }

    public function stok_atk()
    {
        $data['title'] = "ATK";
        $data['second_title'] = "Stok ATK";
        $data['stok_atk'] = $this->db->get('master_stok_atk')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('atk/stok-atk', $data);
        $this->load->view('template/footer');
    }

    public function input_stok_atk()
    {
        $this->form_validation->set_rules('jenis_atk', 'Jenis atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('kode_atk', 'Kode atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('nama_atk', 'Nama atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('merk_atk', 'Merk atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('stok_atk', 'Stok atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "ATK";
            $data['second_title'] = "Input Stok ATK";
            $data['jenis_atk'] = $this->db->get('master_jenis_atk')->result_array();

            $this->load->view('template/header', $data);
            $this->load->view('atk/input-stok-atk', $data);
            $this->load->view('template/footer');
        } else {
            $foto = $_FILES['foto_atk']['name'];
            
            if ($foto) {
                $config['upload_path']          = './assets/dist/img/atk/';
                $config['allowed_types']        = 'png|jpg|jpeg';
                $config['max_size']             = 5048;
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('foto_atk')) {
                    $foto_atk = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $foto_atk = '';
            }

            $data = [
                'kode_atk'       => $this->input->post('kode_atk'),
                'nama_atk'       => $this->input->post('nama_atk'),
                'merk_atk'       => $this->input->post('merk_atk'),
                'jenis_atk'      => $this->input->post('jenis_atk'),
                'stok_atk'       => $this->input->post('stok_atk'),
                'foto_atk'       => $foto_atk
            ];

            $this->db->insert('master_stok_atk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5> Stok ATK Berhasil Ditambahkan.
            </div>');
            redirect('atk/stok-atk');
        }
    }

    public function edit_stok_atk()
    {
        $this->form_validation->set_rules('jenis_atk', 'Jenis atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('kode_atk', 'Kode atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('nama_atk', 'Nama atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('merk_atk', 'Merk atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('stok_atk', 'Stok atk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);

        $id = $this->uri->segment(3);

        if ($this->form_validation->run() == false) {
            $data['stok_atk'] = $this->db->get_where('master_stok_atk', ['id_stok' => $id])->row_array();
            $data['title'] = "ATK";
            $data['second_title'] = "Edit Stok ATK";
    
            $this->load->view('template/header', $data);
            $this->load->view('atk/edit-stok-atk', $data);
            $this->load->view('template/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $foto = $_FILES['foto_atk']['name'];
            $data = $this->db->get_where('master_stok_atk', ['id_stok' => $this->input->post('id_stok')])->row_array();

            if ($foto) {
                $config['upload_path']          = './assets/dist/img/atk/';
                $config['allowed_types']        = 'png|jpg|jpeg';
                $config['max_size']             = 5048;
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('foto_atk')) {
                    $old_image = $data['foto_atk'];

                    if ($foto != $old_image) {
                        unlink(FCPATH . "/assets/dist/img/atk/" . $old_image);
                    }
                    $foto_atk = $this->upload->data('file_name');
                    $this->db->set('foto_atk', $foto_atk);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_atk', $this->input->post('nama_atk'));
            $this->db->set('merk_atk', $this->input->post('merk_atk'));
            $this->db->set('stok_atk', $this->input->post('stok_atk'));
            $this->db->set('date_updated', date('Y-m-d H:i:s'));
            $this->db->where('id_stok', $this->input->post('id_stok'));
            

            if ($this->db->update('master_stok_atk')) {
                echo "berhasil";
            } else {
                echo "gagal";
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5> Stok Hardware Berhasil Diperbaharui.
            </div>');
            redirect('atk/stok-atk');
        }
    }

    public function delete_stok_atk($id)
    {
        $foto = $this->db->select('foto_atk')->get_where('master_stok_atk', ['id_stok' => $id])->row_array();
        unlink(FCPATH . "/assets/dist/img/atk/" . $foto['foto_atk']);
        $this->db->delete('master_stok_atk', ['id_stok' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Stok ATK Berhasil Dihapus.
        </div>');
        redirect('atk/stok-atk');
    }

    public function jenis_atk()
    {
        $data['title'] = "ATK";
        $data['second_title'] = "Jenis ATK";
        $data['jenis_atk'] = $this->db->get('master_jenis_atk')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('atk/jenis-atk', $data);
        $this->load->view('template/footer');
    }

    public function tambah_jenis_atk()
    {
        $data = [
            'nama_jenis_atk'   => htmlspecialchars($this->input->post('nama_jenis_atk'), TRUE),
            'kode_jenis_atk'   => htmlspecialchars($this->input->post('kode_jenis_atk'), TRUE)
        ];

        $this->db->insert('master_jenis_atk', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Jenis ATK Baru Berhasil Ditambahkan.
        </div>');
        redirect('atk/jenis-atk');
    }

    public function edit_jenis_atk()
    {
        $this->db->set('nama_jenis_atk', htmlspecialchars($this->input->post('nama_jenis_atk'), TRUE));
        $this->db->set('kode_jenis_atk', htmlspecialchars($this->input->post('kode_jenis_atk'), TRUE));
        $this->db->where('id_jenis_atk', htmlspecialchars($this->input->post('id_jenis_atk'), TRUE));
        $this->db->update('master_jenis_atk');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Jenis ATK Berhasil Diperbaharui.
        </div>');
        redirect('atk/jenis-atk');
    }

    public function delete_jenis_atk($id)
    {
        $this->db->delete('master_jenis_atk', ['id_jenis_atk' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Jenis ATK Berhasil Dihapus.
        </div>');
        redirect('atk/jenis-atk');
    }

    public function atk_habis()
    {
        $data['title'] = "ATK";
        $data['second_title'] = "ATK Habis";
        
        $data['stok_atk'] = $this->db->query('select * from master_stok_atk where stok_atk < 1')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('atk/atk-habis', $data);
        $this->load->view('template/footer');
    }
}