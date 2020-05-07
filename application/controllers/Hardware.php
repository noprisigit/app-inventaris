<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hardware extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if (!$this->session->userdata('username'))
            redirect('auth');
    }
    // public function index() 
    // {
    //     $data['title'] = "Dashboard";

    //     $this->load->view('template/header', $data);
    //     $this->load->view('home/index');
    //     $this->load->view('template/footer');
    // }

    public function stok_hardware()
    {
        $data['title'] = "Hardware";
        $data['second_title'] = "Stok Hardware";
        $data['stok_hardware'] = $this->db->get('master_stok_hardware')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('hardware/stok-hardware', $data);
        $this->load->view('template/footer');
    }

    public function input_stok_hardware()
    {
        $this->form_validation->set_rules('jenis_barang', 'Jenis barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('merk_barang', 'Merk barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal barang masuk', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Hardware";
            $data['second_title'] = "Input Stok Hardware";
            $data['jenis_barang'] = $this->db->get('master_jenis_hardware')->result_array();

            $this->load->view('template/header', $data);
            $this->load->view('hardware/input-stok-hardware', $data);
            $this->load->view('template/footer');
        } else {
            $foto = $_FILES['foto_barang']['name'];
            
            if ($foto) {
                $config['upload_path']          = './assets/dist/img/hardware/';
                $config['allowed_types']        = 'png|jpg|jpeg';
                $config['max_size']             = 2048;
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('foto_barang')) {
                    $foto_barang = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $foto_barang = '';
            }

            $data = [
                'kode_barang'       => $this->input->post('kode_barang'),
                'nama_barang'       => $this->input->post('nama_barang'),
                'merk_barang'       => $this->input->post('merk_barang'),
                'jenis_barang'      => $this->input->post('jenis_barang'),
                'kondisi_barang'    => $this->input->post('kondisi_barang'),
                'tgl_masuk'         => $this->input->post('tgl_masuk'),
                'foto_barang'       => $foto_barang
            ];

            $this->db->insert('master_stok_hardware', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5> Stok Hardware Berhasil Ditambahkan.
            </div>');
            redirect('hardware/stok-hardware');
        }
    }

    public function edit_stok_hardware()
    {   
        $this->form_validation->set_rules('jenis_barang', 'Jenis barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('merk_barang', 'Merk barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi barang', 'trim|required', [
            'required'  => '%s harus diisi',
        ]);

        $id = $this->uri->segment(3);
        if ($this->form_validation->run() == false) {
            $data['stok_hardware'] = $this->db->get_where('master_stok_hardware', ['id_stok' => $id])->row_array();

            $data['title'] = "Hardware";
            $data['second_title'] = "Edit Stok Hardware";

            $this->load->view('template/header', $data);
            $this->load->view('hardware/edit-stok-hardware', $data);
            $this->load->view('template/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $foto = $_FILES['foto_barang']['name'];
            $data = $this->db->get_where('master_stok_hardware', ['id_stok' => $this->input->post('id_stok')])->row_array();

            if ($foto) {
                $config['upload_path']          = './assets/dist/img/hardware/';
                $config['allowed_types']        = 'png|jpg|jpeg';
                $config['max_size']             = 5048;
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('foto_barang')) {
                    $old_image = $data['foto_barang'];

                    if ($foto != $old_image) {
                        unlink(FCPATH . "/assets/dist/img/hardware/" . $old_image);
                    }
                    $foto_barang = $this->upload->data('file_name');
                    $this->db->set('foto_barang', $foto_barang);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_barang', $this->input->post('nama_barang'));
            $this->db->set('merk_barang', $this->input->post('merk_barang'));
            $this->db->set('kondisi_barang', $this->input->post('kondisi_barang'));
            $this->db->set('date_updated', date('Y-m-d H:i:s'));
            $this->db->where('id_stok', $this->input->post('id_stok'));
            
            if ($this->db->update('master_stok_hardware')) {
                echo "berhasil";
            } else {
                echo "gagal";
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5> Stok Hardware Berhasil Diperbaharui.
            </div>');
            redirect('hardware/stok-hardware');
        }
    }

    public function delete_stok_hardware($id) {
        $foto = $this->db->select('foto_barang')->get_where('master_stok_hardware', ['id_stok' => $id])->row_array();
        unlink(FCPATH . "/assets/dist/img/hardware/" . $foto['foto_barang']);
        $this->db->delete('master_stok_hardware', ['id_stok' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Stok Hardware Berhasil Dihapus.
        </div>');
        redirect('hardware/stok-hardware');
    }

    public function jenis_hardware()
    {
        $data['title'] = "Hardware";
        $data['second_title'] = "Jenis Hardware";
        $data['jenis_hardware'] = $this->db->get('master_jenis_hardware')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('hardware/jenis-hardware', $data);
        $this->load->view('template/footer');
    }

    public function tambah_jenis_hardware()
    {
        $data = [
            'nama_jenis_hardware'   => htmlspecialchars($this->input->post('nama_jenis_hardware'), TRUE),
            'kode_jenis_hardware'   => htmlspecialchars($this->input->post('kode_jenis_hardware'), TRUE)
        ];

        $this->db->insert('master_jenis_hardware', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Jenis Hardware Baru Berhasil Ditambahkan.
        </div>');
        redirect('hardware/jenis-hardware');
    }

    public function edit_jenis_hardware()
    {
        $this->db->set('nama_jenis_hardware', htmlspecialchars($this->input->post('nama_jenis_hardware'), TRUE));
        $this->db->set('kode_jenis_hardware', htmlspecialchars($this->input->post('kode_jenis_hardware'), TRUE));
        $this->db->where('id_jenis_hardware', htmlspecialchars($this->input->post('id_jenis_hardware'), TRUE));
        $this->db->update('master_jenis_hardware');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Jenis Hardware Berhasil Diperbaharui.
        </div>');
        redirect('hardware/jenis-hardware');
    }

    public function delete_jenis_hardware($id)
    {   
        $this->db->delete('master_jenis_hardware', ['id_jenis_hardware' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Jenis Hardware Berhasil Dihapus.
        </div>');
        redirect('hardware/jenis-hardware');
    }

    public function hardware_rusak()
    {
        $data['title'] = "Hardware";
        $data['second_title'] = "Hardware Rusak";
        $data['stok_hardware'] = $this->db->get_where('master_stok_hardware', ['kondisi_barang' => 'Rusak'])->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('hardware/hardware-rusak', $data);
        $this->load->view('template/footer');
    }

    public function detail_hardware() {
        $data['title'] = "Hardware";
        $data['second_title'] = "Detail Hardware";
        $data['stok_hardware'] = $this->db->get_where('master_stok_hardware', ['kondisi_barang' => 'Rusak'])->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('hardware/detail-hardware', $data);
        $this->load->view('template/footer');
    }

    public function pengembalian_hardware()
    {
        $data['title'] = "Hardware";
        $data['second_title'] = "Pengembalian Hardware";
        $data['stok_hardware'] = $this->db->get_where('master_stok_hardware', ['status_pengembalian' => 1])->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('hardware/pengembalian-hardware');
        $this->load->view('template/footer');
    }

    public function pengembalian_proses()
    {
        // print_r($this->input->post());
        // exit;
        $this->db->set('tgl_pengembalian', $this->input->post('tgl_pengembalian'));
        $this->db->set('status_pengembalian', 1);
        $this->db->where('id_stok', $this->input->post('id_stok'));
        $this->db->update('master_stok_hardware');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5> Pengembalian Barang Berhasil Dilakukan.
        </div>');
        redirect('hardware/pengembalian_hardware');
    }
}