<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('People_model');
    }

    public function index()
    {
        $this->load->model('People_model');
        $this->load->library('pagination');

        $filters = [
            'name' => $this->input->get('name'),
            'role' => $this->input->get('role'),
        ];

        $limit = 5;
        $page  = max(1, (int) $this->uri->segment(3));
        $offset = ($page - 1) * $limit;

        $total = $this->People_model->countWithCurrentRole($filters);

        $config['base_url'] = site_url('home/index');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = true;
        $config['uri_segment'] = 3;

        // manter filtros na paginação
        $config['reuse_query_string'] = true;

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

        $data['people'] = $this->People_model->getWithCurrentRolePaginated(
            $filters,
            $limit,
            $offset
        );

        $data['links'] = $this->pagination->create_links();

        $data['total'] = $total;
        $data['start'] = $total > 0 ? ($offset + 1) : 0;
        $data['end']   = min($offset + $limit, $total);

        $this->load->view('templates/header', ['title' => 'People Management']);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
