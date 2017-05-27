<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Authencation extends MY_Controller 
{
    public $user        = []; /** @var array $user        The authencated user data.        */
	public $permissions = []; /** @var array $permissions The authencated user permissions. */
	public $abilities   = []; /** @var array $abilities   The authencated user abilities.   */   

    public function __construct() 
    {
        parent::__construct(); 

        $this->user        = $this->session->userdata('user');
		$this->abilities   = $this->session->userdata('abilities');
		$this->permissions = $this->session->userdata('permissions'); 
    }
}