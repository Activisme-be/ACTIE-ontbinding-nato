<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * Class Authencation
 */
class Authencation extends MY_Controller 
{
    public $user        = []; /** @var array $user        The authencated user data.        */
    public $permissions = []; /** @var array $permissions The authencated user permissions. */
    public $abilities   = []; /** @var array $abilities   The authencated user abilities.   */   

    public function __construct() 
    {
        parent::__construct(); 
        $this->load->library(['blade', 'session', 'form_validation']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->abilities   = $this->session->userdata('abilities');
        $this->permissions = $this->session->userdata('permissions'); 
    }

    /**
     * The index view for the authencation. 
     *
     * @return Blade
     */
    public function index() 
    {
        $data['title'] = 'Inloggen';
        return $this->blade->render('authencation/index', $data);
    }

    /**
     * Base method for validation the credentials.
     *
     * @return Response|Blade view
     */
    public function verify() 
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required'); 
        $this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() === false) { // Form validation fails
            $data['title'] = 'Inloggen';
            return $this->blade->render('authencation/index', $data);

            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'De gebruikersnaam en het wachtwoord is foutief. En kan niet worden gevonden.');

            return $this->blade->render('authencation/index', $data);
        }

        return redirect(site_url('backend'));
    }
}