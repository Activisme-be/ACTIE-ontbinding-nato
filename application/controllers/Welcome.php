<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Welcome extends MY_Controller
{
	/**
	 * Welcome constructor.
	 *
	 * @return void
	 */
	public function __construct() 
	{
		parent::__construct(); 

		$this->load->library(['blade', 'session', 'form_validation']);
		$this->load->helper(['url']);
	}

	/**
	 * Display the petition text.
	 *
	 * @return mixed
	 */
	public function index()
	{
		return $this->blade->render('index');
	}
}
