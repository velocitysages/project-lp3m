<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('penelitian_m');
	}
	public function index()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/home');
		$this->load->view('templates/auth_footer');
	}

	public function daftarusulanpenelitian()
	{
		$periode['row'] = $this->penelitian_m->get_periode();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/penelitian/daftar_usulan_penelitian', $periode);
		$this->load->view('templates/auth_footer');
	}

	public function proses_daftarusulanpenelitian()
	{
		if (isset($_POST['submit'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('periodepengajuan', 'Periode Pengajuan', 'required');
			$this->form_validation->set_rules('judul_penelitian', 'Judul Penelitian', 'required');
			$this->form_validation->set_rules('matkul_diampu', 'Matkul Yang Diampu', 'required');
			$this->form_validation->set_rules('kelompok_riset', 'Kelompok Riset', 'required');
			$this->form_validation->set_rules('mhs_terlibat', 'Mahasiswa Yang Dilibatkan', 'required');
			// $this->form_validation->set_rules('file_proposal', 'File Proposal', 'required');
			// $this->form_validation->set_rules('file_rps', 'File RPS', 'required');
			// $this->form_validation->set_rules('form_integrasi', 'Form Intergrasi', 'required');
			$this->form_validation->set_message('required', '%s Masih Kosong!!');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			$config['upload_path']          = './upload/penelitian';
			$config['allowed_types']        = 'pdf';
			$config['max_size']            = 2048;
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			if (!empty($_FILES['file_proposal']['name'])) {
				$this->upload->do_upload('file_proposal');
				$file_proposal = $this->upload->data();
				$file_proposal = $file_proposal['file_name'];
			}
			if (!empty($_FILES['file_rps']['name'])) {
				$this->upload->do_upload('file_rps');
				$file_rps = $this->upload->data();
				$file_rps = $file_rps['file_name'];
			}
			if (!empty($_FILES['form_integrasi']['name'])) {
				$this->upload->do_upload('form_integrasi');
				$form_integrasi = $this->upload->data();
				$form_integrasi = $form_integrasi['file_name'];
			}
			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$id_periode = $this->input->post('periodepengajuan');
				$judul_penelitian = $this->input->post('judul_penelitian', TRUE);
				$matkul_diampu = $this->input->post('matkul_diampu', TRUE);
				$kelompok_riset = $this->input->post('kelompok_riset', TRUE);
				$mhs_terlibat = $this->input->post('mhs_terlibat', TRUE);
				$data = [
					'id' => $id,
					'id_periode' => $id_periode,
					'judul_penelitian' => $judul_penelitian,
					'matkul_diampu' => $matkul_diampu,
					'kelompok_riset' => $kelompok_riset,
					'mhs_terlibat' => $mhs_terlibat,
					'file_proposal' => $file_proposal,
					'file_rps' => $file_rps,
					'form_integrasi' => $form_integrasi
				];
				$insert = $this->db->insert('tbl_penelitian', $data);
				if ($insert) {
					$this->session->set_flashdata('successalert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data Usulan Penelitian Berhasil Disubmit.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					redirect('dosen/daftarusulanpenelitian');
				}
			} else {
				$this->daftarusulanpenelitian();
			}
		} else {
			$this->daftarusulanpenelitian();
		}
	}
	public function arsip_penelitian()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/penelitian/arsip');
		$this->load->view('templates/auth_footer');
	}
	public function daftarusulanpengabdian()
	{
		$periode['row'] = $this->penelitian_m->get_periode();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/pengabdian_masyarakat/daftar_usulan_pengabdian', $periode);
		$this->load->view('templates/auth_footer');
	}

	public function proses_daftarusulanpengabdian()
	{
		if (isset($_POST['submit'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('periodepengajuan', 'Periode Pengajuan', 'required');
			$this->form_validation->set_rules('judul_pengabmas', 'Judul Penelitian', 'required');
			$this->form_validation->set_rules('matkul_diampu', 'Matkul Yang Diampu', 'required');
			$this->form_validation->set_rules('kelompok_riset', 'Kelompok Riset', 'required');
			$this->form_validation->set_rules('mhs_terlibat', 'Mahasiswa Yang Dilibatkan', 'required');
			// $this->form_validation->set_rules('file_proposal', 'File Proposal', 'required');
			// $this->form_validation->set_rules('file_rps', 'File RPS', 'required');
			// $this->form_validation->set_rules('form_integrasi', 'Form Intergrasi', 'required');
			$this->form_validation->set_message('required', '%s Masih Kosong!!');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			$config['upload_path']          = './upload/pengabdian_masyarakat';
			$config['allowed_types']        = 'pdf';
			$config['max_size']            = 2048;
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			if (!empty($_FILES['file_proposal']['name'])) {
				$this->upload->do_upload('file_proposal');
				$file_proposal = $this->upload->data();
				$file_proposal = $file_proposal['file_name'];
			}
			if (!empty($_FILES['file_rps']['name'])) {
				$this->upload->do_upload('file_rps');
				$file_rps = $this->upload->data();
				$file_rps = $file_rps['file_name'];
			}
			if (!empty($_FILES['form_integrasi']['name'])) {
				$this->upload->do_upload('form_integrasi');
				$form_integrasi = $this->upload->data();
				$form_integrasi = $form_integrasi['file_name'];
			}
			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$id_periode = $this->input->post('periodepengajuan');
				$judul_pengabmas = $this->input->post('judul_pengabmas', TRUE);
				$matkul_diampu = $this->input->post('matkul_diampu', TRUE);
				$kelompok_riset = $this->input->post('kelompok_riset', TRUE);
				$mhs_terlibat = $this->input->post('mhs_terlibat', TRUE);
				$data = [
					'id' => $id,
					'id_periode' => $id_periode,
					'judul_pengabmas' => $judul_pengabmas,
					'matkul_diampu' => $matkul_diampu,
					'kelompok_riset' => $kelompok_riset,
					'mhs_terlibat' => $mhs_terlibat,
					'file_proposal' => $file_proposal,
					'file_rps' => $file_rps,
					'form_integrasi' => $form_integrasi
				];
				$insert = $this->db->insert('tbl_pengabmas', $data);
				if ($insert) {
					$this->session->set_flashdata('successnotif', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Data Pendaftaran Pangabdian Masyarakat Berhasil Disubmit.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					redirect('dosen/daftarusulanpenelitian');
				}
			} else {
				$this->daftarusulanpenelitian();
			}
		} else {
			$this->daftarusulanpenelitian();
		}
	}
	public function arsip_pengabdian()
	{

		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/pengabdian_masyarakat/arsip');
		$this->load->view('templates/auth_footer');
	}

	public function editprofile()
	{

		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/editprofile');
		$this->load->view('templates/auth_footer');
	}
}
