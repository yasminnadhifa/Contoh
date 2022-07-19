<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        is_logged_in();
        $this->load->model("Prodi_model");
    }

    public function index()
    {
        $data['judul'] = "Halaman Prodi";
        $data['Prodi'] = $this->Prodi_model->get();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('prodi/vw_prodi', $data);
        $this->load->view('layout/footer', $data);
    }
    function tambah()
    {
        $data['judul'] = "Halaman Tambah prodi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['prodi'] = $this->Prodi_model->get();
        $this->form_validation->set_rules('nama', 'nama prodi', 'required', [
            'required' => 'nama prodi wajib di isi'
        ]);
        $this->form_validation->set_rules('ruangan', 'no ruangan', 'required', [
            'required' => 'ruangan prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required', [
            'required' => 'jurusan prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('akreditasi', 'akreditasi', 'required', [
            'required' => 'akreditasi prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_kaprodi', 'nama_kaprodi', 'required', [
            'required' => 'nama_kaprodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('tahun_berdiri', 'tahun_berdiri', 'required', [
            'required' => 'tahun_berdiri Wajib di isi'

        ]);
        $this->form_validation->set_rules('output_lulusan', 'output_lulusan', 'required', [
            'required' => 'output_lulusan Wajib di isi',

        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("prodi/vw_tambah_prodi", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'ruangan' => $this->input->post('ruangan'),

                'jurusan' => $this->input->post('jurusan'),
                'akreditasi' => $this->input->post('akreditasi'),
                'nama_kaprodi' => $this->input->post('nama_kaprodi'),
                'tahun_berdiri' => $this->input->post('tahun_berdiri'),
                'output_lulusan' => $this->input->post('output_lulusan'),

            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/prodi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Prodi_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data 
prodi Berhasil Ditambah!</div>');
            redirect('Prodi');
        }
    }

    function edit($id)
    {
        $data['judul'] = "Halaman Edit Prodi";
        $data['prodi'] = $this->Prodi_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Prodi', 'required', [
            'required' => 'Nama Prodi Wajib di isi'
        ]);

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', [
            'required' => 'Jurusan Wajib di isi'
        ]);
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required', [
            'required' => 'Ruangan Wajib di isi'
        ]);
        $this->form_validation->set_rules('akreditasi',  'Akreditasi', 'required', [
            'required' => 'Akreditasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_kaprodi', 'Nama Kaprodi', 'required', [
            'required' => 'Nama Kaprodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('tahun_berdiri', 'Tahun Berdiri', 'required|numeric', [
            'required' => 'Tahun Berdiri Wajib di isi',
            'numeric' => 'Tahun Berdiri harus Angka'
        ]);
        $this->form_validation->set_rules('output_lulusan', 'Output Lulusan', 'required', [
            'required' => 'Output Lulusan Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("prodi/vw_ubah_prodi", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'ruangan' => $this->input->post('ruangan'),
                'jurusan' => $this->input->post('jurusan'),
                'akreditasi' => $this->input->post('akreditasi'),
                'nama_kaprodi' => $this->input->post('nama_kaprodi'),
                'tahun_berdiri' => $this->input->post('tahun_berdiri'),
                'output_lulusan' => $this->input->post('output_lulusan'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/prodi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['prodi']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/prodi/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Prodi_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prodi Berhasil Diubah!</div>');
            redirect('Prodi');
        }
    }

    public function hapus($id)
    {
        $this->Prodi_model->delete($id);
        $eror = $this->db->error();
        if ($eror['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data prodi tidak berhasil di hapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-info-circle"></i>Data prodi berhasil di hapus!</div>');
        }
        redirect('Prodi');
    }
}
