<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Disclaimer
 */
class Disclaimer extends CI_Controller
{
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
