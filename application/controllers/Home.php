<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('People_model');
    }

    public function index()
    {
        $filters = [
            'name' => $this->input->get('name'),
            'role' => $this->input->get('role'),
        ];

        $data['people'] = $this->People_model->getWithCurrentRole($filters);

        $this->load->view('templates/header', ['title' => 'People Management']);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

}

