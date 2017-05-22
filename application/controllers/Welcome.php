<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct(); 

		$this->load->library(['blade', 'session']);
		$this->load->helper(['url']);
	}

	public function index()
	{
		return $this->blade->render('index');
	}
}
