<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurusan_model');
	}

	public function index()
	{
		$data['judul'] = "Halaman Jurusan";
		$data['jurusan'] = $this->Jurusan_model->get();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("layout/header", $data);
		$this->load->view("jurusan/vw_jurusan", $data);
		$this->load->view("layout/footer");
	}
	function tambah()
	{
		$data['judul'] = "Halaman Tambah Jurusan";

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Jurusan', 'required', [
			'required' => 'Nama Jurusan Wajib di isi'
		]);
		$this->form_validation->set_rules('singkatan', 'Singkatan', 'required', [
			'required' => 'Singkatan Wajib di isi'
		]);
		$this->form_validation->set_rules('kajur',  'Kajur', 'required', [
			'required' => 'Kajur Wajib di isi'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("jurusan/vw_tambah_jurusan", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'singkatan' => $this->input->post('singkatan'),
				'kajur' => $this->input->post('kajur'),
			];
			$this->Jurusan_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Ditambah!</div>');
			redirect('Jurusan');
		}
	}
	public function hapus($id)
	{
		$this->Jurusan_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Jurusan tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Jurusan Berhasil Dihapus!</div>');
		}
		redirect('Jurusan');
	}

	function edit($id)
	{
		$data['judul'] = "Halaman Edit Jurusan";
		$data['jurusan'] = $this->Jurusan_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Jurusan', 'required', [
			'required' => 'Nama Jurusan Wajib di isi'
		]);
		$this->form_validation->set_rules('singkatan', 'Singkatan', 'required', [
			'required' => 'Singkatan Wajib di isi'
		]);
		$this->form_validation->set_rules('kajur',  'Kajur', 'required', [
			'required' => 'Kajur Wajib di isi'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("jurusan/vw_ubah_jurusan", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'singkatan' => $this->input->post('singkatan'),
				'kajur' => $this->input->post('kajur'),
				'id' => $this->input->post('id'),
			];

			$this->Jurusan_model->update($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dosen Berhasil Diubah!</div>');
			redirect('Jurusan');
		}
	}
}
