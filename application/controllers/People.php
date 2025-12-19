<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('People_model');
    }

    public function index()
    {
        $data['people'] = $this->People_model->getAll();
        $this->load->view('people/index', $data);
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
        $data['person'] = $this->People_model->find($id);
        $this->load->view('people/edit', $data);
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
}
