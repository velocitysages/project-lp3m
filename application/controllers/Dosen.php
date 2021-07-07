<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function index()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/home', $data);
		$this->load->view('templates/auth_footer');
	}

	public function penelitian()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/penelitian/menu');
		$this->load->view('templates/topbar');
		$this->load->view('templates/content');
		$this->load->view('templates/auth_footer');
	}

	public function arsip()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/penelitian/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/penelitian/arsip');
		$this->load->view('templates/auth_footer');
	}

	public function daftarusulanpenelitian()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen//penelitian/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/penelitian/daftar_usulan_penelitian');
		$this->load->view('templates/auth_footer');
	}
}
