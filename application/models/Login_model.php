<?php

class Login_model extends CI_Model
{
    private $_table = "users";

    public function doLogout(){
		$this->session->sess_destroy();
	}

	public function isLoggedIn()
	{
		return $this->session->userdata('udatanama') != "";
	}

	public function setLoginUser($userdata){
		// Set session ke user yang login sekarang
		$this->session->set_userdata('udatanama', $userdata->nama);
	}

	public function getAdminName(){
		return $this->session->userdata('udatanama');
	}

	public function doLogin($username, $password){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("username", $username);
		$userData = $this->db->get()->row();

		if($userData == null){
			return false;
		} else {
			if(password_verify($password, $userData->password)){
				$this->setLoginUser($userData);
				return true;
			} else {
				return false;
			}
		}
	}
}