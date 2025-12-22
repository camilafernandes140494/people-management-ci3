<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{

    protected $table = 'roles';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function find($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row();
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    public function getPaginated($limit, $offset)
    {
        return $this->db
            ->limit($limit, $offset)
            ->order_by('name', 'ASC')
            ->get('roles')
            ->result();
    }

    public function countAll()
    {
        return $this->db->count_all('roles');
    }
}
