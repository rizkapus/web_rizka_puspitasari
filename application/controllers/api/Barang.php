<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Barang extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang');     
    }

    public function index_get() {
        $barang = $this->barang->getBarang();

        $id = $this->get('id');
        if($id == null) {
            $barang =  $this->barang->getBarang();
        }
        else {
            $barang= $this->barang->getBarang($id);
        }

        if($barang) {
            $this->response([
                'status' => 'true',
                'data' => $barang
            ], REST_Controller::HTTP_OK);
        } 
        else {
            $$this->response([
                'status' => 'false',
                'message' => 'id not found' 
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete() {
        $id = $this->delete('id');

        if($id == null) {
            $this->response([
                'status' => 'true',
                'message' => 'id salah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        else {
            if($this->barang->deleteBarang($id) > 0) {
                $this->response([
                    'status' => 'true',
                    'id' => $id,
                    'message' => 'id berhasil dihapus'
                ], REST_Controller::HTTP_NO_CONTENT);
            } 
            else {
                $this->response([
                    'status' => 'true',
                    'message' => 'id tidak ditemukan'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post() {
        $data = [
            'nama' => $this->post('nama'),
        ];

        if($this->barang->createBarang($data)>0) {
            $this->response([
                'status' => 'true',
                'message' => 'data berhasil ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        }
        else{
            $this->response([
                'status' => 'true',
                'message' => 'gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put() {
        $id =  $this->put('id');

        $data = [
            'nama' => $this->put('nama'),
        ];

        if($this->barang->updateBarang($data, $id)>0) {
            $this->response([
                'status' => 'true',
                'message' => 'data berhasil diupdate'
            ], REST_Controller::HTTP_NO_CONTENT);
        }
        else{
            $this->response([
                'status' => 'true',
                'message' => 'gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    

}

?>