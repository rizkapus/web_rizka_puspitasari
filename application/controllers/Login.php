<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->library('form_validation');
    }

    public function index()
	{
	
		$this->load->view("login");
	}

    public function login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		if ($this->login_model->doLogin($username, $password)) {
			redirect(base_url('barang/list_barang'));
		} else {
			redirect(base_url('barang/list_barang'));
		}

	}

	public function logout()
	{
		$this->login_model->doLogout();
		redirect(base_url(''));
	}
}