<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Disclaimer
 */
class Disclaimer extends MY_Controller
{
    public $user        = []; /** @var array $user        The authencated user data.        */
	public $permissions = []; /** @var array $permissions The authencated user permissions. */
	public $abilities   = []; /** @var array $abilities   The authencated user abilities.   */

	/**
	 * Disclaimer constructor.
	 *
	 * @return void
	 */
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
	 * The disclaimer controller.
	 *
	 * @return mixed
	 */
    public function index()
    {
        $data['title'] = 'Disclaimer';
        return $this->blade->render('disclaimer', $data);
    }
}
