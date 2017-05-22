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

    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'Naam', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail adres', 'trim|required|is_unique[signatures.email]');
        $this->form_validation->set_rules('country', 'Land', 'trim|required');
        $this->form_validation->set_rules('city', 'Stad', 'trim|required');

        if ($this->form_validation->run() === false) {
            return $this->blade->render('index');
        }
    }
}