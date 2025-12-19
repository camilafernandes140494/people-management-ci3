<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People_model extends CI_Model {

    public function getAll() {
        return $this->db->get('people')->result();
    }

    public function find($id) {
        return $this->db->where('id', $id)->get('people')->row();
    }

    public function insert($data) {
        return $this->db->insert('people', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('people', $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete('people');
    }
}

