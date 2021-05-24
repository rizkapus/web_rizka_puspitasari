<?php

class barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("barang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->login_model->isLoggedIn()) {
			redirect(base_url('barang/list_barang'));
			exit;
		}
        $this->load->view("login");
    }

    public function list_barang()
    {
        $barang = $this->barang_model->getBarang();

		$data = array(
			"barang" => $barang
		);

		return $this->load->view("list_barang", $data);

    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}