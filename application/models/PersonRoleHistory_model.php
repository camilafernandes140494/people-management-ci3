<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonRoleHistory_model extends CI_Model {

    protected $table = 'person_role_history';

    public function getCurrentRole($person_id)
    {
        return $this->db
            ->where('person_id', $person_id)
            ->where('end_date IS NULL', null, false)
            ->get($this->table)
            ->row();
    }


    public function closeCurrentRole($history_id, $end_date)
    {
        return $this->db
            ->where('id', $history_id)
            ->update($this->table, [
                'end_date' => $end_date
            ]);
    }


    public function assignRole($person_id, $role_id, $start_date)
    {
        return $this->db->insert($this->table, [
            'person_id'  => $person_id,
            'role_id'    => $role_id,
            'start_date' => $start_date,
            'end_date'   => null
        ]);
    }


    // 👇 ESSE É O MÉTODO DO HISTÓRICO (SUA DÚVIDA)
    public function getByPerson($person_id)
    {
        return $this->db
            ->select('prh.*, r.name as role_name')
            ->from('person_role_history prh')
            ->join('roles r', 'r.id = prh.role_id')
            ->where('prh.person_id', $person_id)
            ->order_by('prh.start_date', 'DESC')
            ->get()
            ->result();
    }

    public function getCurrentRoleByPerson($person_id)
    {
        $this->db->select('roles.name');
        $this->db->from('person_role_history');
        $this->db->join('roles', 'roles.id = person_role_history.role_id');
        $this->db->where('person_role_history.person_id', $person_id);
        $this->db->where('person_role_history.end_date IS NULL', null, false);
        $this->db->limit(1);

        return $this->db->get()->row();
    }
    
    public function getActivePeopleByRole($role_id)
    {
        return $this->db
            ->select('p.id, p.name, prh.start_date')
            ->from('person_role_history prh')
            ->join('people p', 'p.id = prh.person_id')
            ->where('prh.role_id', $role_id)
            ->where('prh.end_date IS NULL', null, false)
            ->order_by('p.name', 'ASC')
            ->get()
            ->result();
    }

}
