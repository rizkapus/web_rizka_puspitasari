<?php

class Barang_model extends CI_Model {
    public function getBarang($id = null) {
        return $this->db->query("SELECT b.nama, s.jumlah FROM barang b
                                INNER JOIN stocks s ON b.id=s.barang_id 
                                GROUP BY barang_id
                                ORDER BY barang_id desc")->result();

         if($id == null) {
            return $this->db->query("SELECT b.nama, s.jumlah FROM barang b
                                    INNER JOIN stocks s ON b.id=s.barang_id 
                                    GROUP BY barang_id
                                    ORDER BY barang_id desc")->result();
         } 
         else {
            return $this->db->query("SELECT b.nama, s.jumlah FROM barang b
                                    INNER JOIN stocks s ON b.id=s.barang_id WHERE barang_id='$id'
                                    GROUP BY barang_id
                                    ORDER BY barang_id desc")->result();
         }
    }

    public function deleteBarang($id) {
        $delete = $this->db->delete('barang', ['id' => $id]);
        return $this->db->affected_rows(); 

        if($delete) 
        {
            $this->db->delete('stocks', ['id' => $id]);
            return $this->db->affected_rows(); 
        }
    }

    public function createBarang($data) {
        $this->db->insert('barang', $data);
        return $this->db->affected_rows();
    }

    public function updateBarang($data, $id) {
        $this->db->update('barang', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}


?> 