<?php
defined('BASEPATH') or exit('No direct script access allowed');

class People_model extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('people')->result();
    }

    public function find($id)
    {
        return $this->db->where('id', $id)->get('people')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('people', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('people', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('people');
    }


    public function getPaginated($limit, $offset)
    {
        return $this->db
            ->limit($limit, $offset)
            ->order_by('name', 'ASC')
            ->get('people')
            ->result();
    }

    public function countAll()
    {
        return $this->db->count_all('people');
    }


    public function getWithCurrentRolePaginated($filters, $limit, $offset)
    {
        $this->db
            ->select('p.id, p.name, r.name as role_name')
            ->from('people p')
            ->join(
                'person_role_history prh',
                'prh.person_id = p.id AND prh.end_date IS NULL',
                'left'
            )
            ->join('roles r', 'r.id = prh.role_id', 'left');

        if (!empty($filters['name'])) {
            $this->db->like('p.name', $filters['name']);
        }

        if (!empty($filters['role'])) {
            $this->db->like('r.name', $filters['role']);
        }

        return $this->db
            ->order_by('p.name', 'ASC')
            ->limit($limit, $offset)
            ->get()
            ->result();
    }

    public function countWithCurrentRole($filters)
    {
        $this->db
            ->from('people p')
            ->join(
                'person_role_history prh',
                'prh.person_id = p.id AND prh.end_date IS NULL',
                'left'
            )
            ->join('roles r', 'r.id = prh.role_id', 'left');

        if (!empty($filters['name'])) {
            $this->db->where('p.name ILIKE', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['role'])) {
            $this->db->where('r.name ILIKE', '%' . $filters['role'] . '%');
        }


        return $this->db->count_all_results();
    }
}
