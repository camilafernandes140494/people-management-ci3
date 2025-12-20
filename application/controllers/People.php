<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('People_model');
        $this->load->model('PersonRoleHistory_model');

    }

    public function index()
    {
        $people = $this->People_model->getAll();

        foreach ($people as $person) {
            $currentRole = $this->PersonRoleHistory_model
                ->getCurrentRoleByPerson($person->id);

            $person->current_role = $currentRole
                ? $currentRole->name
                : 'Sem cargo';
        }

        $data['people'] = $people;

        $this->load->view('templates/header', ['title' => 'People']);
        $this->load->view('people/index', $data);
        $this->load->view('templates/footer');
    }
    public function create()
    {
        $this->load->view('people/create');
    }

    public function store()
    {
        $this->People_model->insert($this->input->post());
        redirect('people');
    }

    public function edit($id)
    {
        $this->load->model('Role_model');
        $data['person'] = $this->People_model->find($id);
        $data['roles'] = $this->Role_model->getAll();
        $data['history'] = $this->PersonRoleHistory_model->getByPerson($id);

        $this->load->view('templates/header', ['title' => 'Edit Person']);
        $this->load->view('people/edit', $data);
        $this->load->view('templates/footer');
    }


    public function update($id)
    {
        $this->People_model->update($id, $this->input->post());
        redirect('people');
    }

    public function delete($id)
    {
        $this->People_model->delete($id);
        redirect('people');
    }
    
   
    public function assignRole($person_id)
    {
        $role_id    = $this->input->post('role_id');
        $start_date = $this->input->post('start_date');

        // 1. Verifica se existe cargo ativo
        $currentRole = $this->PersonRoleHistory_model->getCurrentRole($person_id);

        // 2. Se existir, encerra
        if ($currentRole) {
            $this->PersonRoleHistory_model->closeCurrentRole(
                $currentRole->id,
                $start_date
            );
        }

        // 3. Cria novo vínculo
        $this->PersonRoleHistory_model->assignRole(
            $person_id,
            $role_id,
            $start_date
        );

        redirect('people/edit/' . $person_id);
    }
    
    public function editHistory($history_id)
    {
        $data['history'] = $this->PersonRoleHistory_model->find($history_id);

        $this->load->view('templates/header', ['title' => 'Editar Histórico']);
        $this->load->view('people/edit_history', $data);
        $this->load->view('templates/footer');
    }

    public function updateHistory($history_id)
    {
        $data = [
            'start_date' => $this->input->post('start_date'),
            'end_date'   => $this->input->post('end_date') ?: null
        ];

        $this->PersonRoleHistory_model->updateHistory($history_id, $data);

        redirect($this->input->post('redirect_to'));
    }


}
