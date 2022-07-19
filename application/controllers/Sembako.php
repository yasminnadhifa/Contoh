<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sembako extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Sembako_model');
    }
    public function index()
    {
        $data['judul'] = "Halaman Sembako";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sembako'] = $this->Sembako_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("sembako/vw_sembako", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Sembako";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sembako'] = $this->Sembako_model->get();
        // $this->form_validation->set_rules('gambar', 'Gambar Sembako', 'required', [
        //     'required' => 'Gambar Wajib di isi'
        // ]);
        $this->form_validation->set_rules('nama', 'Nama Sembako', 'required', [
            'required' => 'Nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|integer', [
            'required' => 'Stok Berdiri Wajib di isi', 'integer' => 'Stok harus Angka'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', [
            'required' => 'Harga Berdiri Wajib di isi', 'integer' => 'Harga harus Angka'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("sembako/vw_tambah_sembako", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/sembako/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Sembako_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data 
            Sembako Berhasil Ditambah!</div>');
            redirect('Sembako');
        }
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Sembako";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sembako'] = $this->Sembako_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("sembako/vw_detail_sembako", $data);
        $this->load->view("layout/footer", $data);
    }
    public function hapus($id)
    {
        $this->Sembako_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon 
        fas fa-info-circle"></i>Data Sembako tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i 
        class="icon fas fa-check-circle"></i>Data Sembako Berhasil Dihapus!</div>');
        }
        redirect('Sembako');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Sembako";
        $data['sembako'] = $this->Sembako_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Sembako', 'required', [
            'required' => 'Nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|integer', [
            'required' => 'Stok Berdiri Wajib di isi', 'integer' => 'Stok harus Angka'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', [
            'required' => 'Harga Berdiri Wajib di isi', 'integer' => 'Harga harus Angka'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("sembako/vw_ubah_sembako", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/sembako/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['sembako']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/sembako/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Sembako_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sembako Berhasil 
            Diubah!</div>');
            redirect('Sembako');
        }
    }
}
