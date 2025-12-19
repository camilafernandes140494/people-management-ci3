<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
    }

    public function index()
    {
        $data['roles'] = $this->Role_model->getAll();

        $this->load->view('templates/header', ['title' => 'Roles']);
        $this->load->view('roles/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header', ['title' => 'New Role']);
        $this->load->view('roles/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->Role_model->insert($this->input->post());
        redirect('role');
    }

    public function edit($id)
    {
        $data['role'] = $this->Role_model->find($id);

        $this->load->view('templates/header', ['title' => 'Edit Role']);
        $this->load->view('roles/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $this->Role_model->update($id, $this->input->post());
        redirect('role');
    }

    public function delete($id)
    {
        $this->Role_model->delete($id);
        redirect('role');
    }
}
