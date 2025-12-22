<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
    }

    public function index()
    {
        $this->load->model('Role_model');
        $this->load->library('pagination');

        $limit = 5;
        $page = max(1, (int) $this->uri->segment(3));
        $offset = ($page - 1) * $limit;

        $total = $this->Role_model->countAll();

        $config['base_url'] = site_url('role/index');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = true;
        $config['uri_segment'] = 3;

        // Bootstrap 5
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';

        $this->pagination->initialize($config);

        $data['roles'] = $this->Role_model->getPaginated($limit, $offset);
        $data['links'] = $this->pagination->create_links();

        $data['total'] = $total;
        $data['start'] = $total > 0 ? ($offset + 1) : 0;
        $data['end']   = min($offset + $limit, $total);

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
        $this->load->model('PersonRoleHistory_model');
        $this->load->model('People_model');

        $data['role'] = $this->Role_model->find($id);
        $data['people'] = $this->People_model->getAll();

        // 👇 NOVO
        $data['activePeople'] =
            $this->PersonRoleHistory_model->getActivePeopleByRole($id);

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
    public function assignPerson($role_id)
    {
        $person_id  = $this->input->post('person_id');
        $start_date = $this->input->post('start_date');

        // carrega o model de histórico
        $this->load->model('PersonRoleHistory_model');

        // verifica se a pessoa já tem cargo ativo
        $currentRole = $this->PersonRoleHistory_model
            ->getCurrentRole($person_id);

        // encerra o cargo atual
        if ($currentRole) {
            $this->PersonRoleHistory_model
                ->closeCurrentRole($currentRole->id, $start_date);
        }

        // cria novo vínculo
        $this->PersonRoleHistory_model->assignRole(
            $person_id,
            $role_id,
            $start_date
        );

        redirect('role/edit/' . $role_id);
    }
}
