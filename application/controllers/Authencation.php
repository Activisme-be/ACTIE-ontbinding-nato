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
        $this->load->library(['blade', 'session']);
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
}