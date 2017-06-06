<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Welcome extends MY_Controller
{
	public $user        = []; /** @var array $user        The authencated user data.        */
	public $permissions = []; /** @var array $permissions The authencated user permissions. */
	public $abilities   = []; /** @var array $abilities   The authencated user abilities.   */
	public $language    = []; /** @var array $language    The language settiàngs for the visitor. */

	/**
	 * Welcome constructor.
	 *
	 * @return void
	 */
	public function __construct() 
	{
		parent::__construct(); 

		$this->load->library(['blade', 'session', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->user        = $this->session->userdata('user');
		$this->abilities   = $this->session->userdata('abilities');
		$this->permissions = $this->session->userdata('permissions'); 
		$this->language    = $this->session->userdata('language');

		// Language loading 
		$this->lang->load('application', $this->language['idiom']);
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
