<?php defined('BASEPATH') or exit('No direct script access allowed');

class Disclaimer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade']);
        $this->load->helper(['url']);
    }

    public function index()
    {
        $data['title'] = 'Disclaimer';
        return $this->blade->render('disclaimer', $data);
    }
}