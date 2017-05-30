<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Support
 */
class Support extends MY_Controller
{
    public $user        = []; /** @var array $user        The authencated user data.        */
	public $permissions = []; /** @var array $permissions The authencated user permissions. */
	public $abilities   = []; /** @var array $abilities   The authencated user abilities.   */
    public $language    = []; /** @var array $language    The language settiàngs for the visitor. */

	/**
	 * Support constructor.
	 *
	 * @return void.
	 */
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['blade', 'session', 'form_validation']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
		$this->abilities   = $this->session->userdata('abilities');
		$this->permissions = $this->session->userdata('permissions'); 
        $this->language    = $this->session->userdata('language'); 
    }

	/**
	 * Display the signatures from the petition.
	 *
	 * @return mixed
	 */
    public function index()
    {
        $this->load->library(['pagination', 'paginator']);

        $data['title']      = 'Steinbetuigingen';
        $data['signatures'] = new Signatures;
        $data['count']      = Signatures::count();

        $this->pagination->initialize($this->paginator->relation(
            base_url('support'), count($data['signatures']->get()), 50, 2)
        );

        $data['results']      = $data['signatures']->skip($this->input->get('page', true))->take(50)->get();
        $data['results_link'] = $this->pagination->create_links();

        return $this->blade->render('support', $data);
    }

	/**
	 * Store the signature in the database.
	 *
	 * @return mixed
	 */
    public function store()
    {
        $this->form_validation->set_rules('name', 'Naam', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail adres', 'trim|required|is_unique[signatures.email]');
        $this->form_validation->set_rules('country', 'Land', 'trim|required');
        $this->form_validation->set_rules('city_name', 'Stadsnaam', 'trim|required');
        $this->form_validation->set_rules('postal_code', 'Postcode', 'trim|required');

        if ($this->form_validation->run() === false) {
            return $this->blade->render('index');
        }

        $input['name']         = $this->input->post('name', true);
        $input['email']        = $this->input->post('email', true);
        $input['country']      = $this->input->post('country', true);
        $input['city_name']    = $this->input->post('city_name', true);
        $input['postal_code']  = $this->input->post('postal_code', true);

        if ($this->input->post('publish', true) === 'N') { // User want to sign anonymous.
            $input['publish'] = 'N';
        } else { // User want to sign public.
            $input['publish'] = 'Y';
        }

        if (Signatures::create($input)) { // True if store success.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Bedankt voor het steunen van dit verdrag.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
