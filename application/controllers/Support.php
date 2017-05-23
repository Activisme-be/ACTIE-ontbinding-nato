<?php defined('BASEPATH') or exit('No direct script access allowed');

class Support extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'session', 'form_validation']);
        $this->load->helper(['url']);
    }

    public function index()
    {
        $this->load->library(['pagination', 'paginator']);

        $data['title']      = 'Steinbetuigingen';
        $data['signatures'] = new Signatures;
        $data['count']      = Signatures::count();

        $this->pagination->initialize($this->paginator->relation(
            base_url('support'), count($data['signatures']->get()), 50, 2)
        );

        $data['results']      = $data['signatures']->skip($this->input->get('page', true))->take(50)->get();
        $data['results_link'] = $this->pagination->create_links();

        return $this->blade->render('support', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'Naam', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail adres', 'trim|required|is_unique[signatures.email]');
        $this->form_validation->set_rules('country', 'Land', 'trim|required');
        $this->form_validation->set_rules('city_name', 'Stadsnaam', 'trim|required');
        $this->form_validation->set_rules('postal_code', 'Postcode', 'trim|required');

        if ($this->form_validation->run() === false) {
            return $this->blade->render('index');
        }

        $input['name']    = $this->input->post('name', true);
        $input['email']   = $this->input->post('email', true);
        $input['country'] = $this->input->post('country', true);
        $input['city_name']    = $this->input->post('city_name', true);
        $input['postal_code']  = $this->input->post('postal_code', true);

        if ($this->input->post('publish', true) === 'N') {
            $input['publish'] = 'N';
        } else {
            $input['publish'] = 'Y';
        }

        if (Signatures::create($input)) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Bedankt voor het steunen van dit verdrag.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}