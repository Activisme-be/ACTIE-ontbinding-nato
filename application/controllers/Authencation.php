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

    /**
	 * Check the given credentials against the database.
	 *
	 * @param  string $password The password for the user.
	 * @return Blade view|Response
	 */
    public function check_database($password)
    {
        $input['email'] = $this->input->post('email', true);

        $MySQL['user'] = Authencate::where('email', $input['email'])
            ->with(['permissions', 'abilities'])
            ->where('blocked', 'N')
            ->where('password', md5($password));

        if ((int) $MySQL['user']->count() === 1) {
            $authencation   = []; // Empty userdata array
            $permissions    = []; // Empty permissions array
            $abilities      = []; // Empty abilitiezs array

            foreach($MySQL['user']->get() as $user) {
                foreach ($user->permissions as $permission) {
                    array_push($permissions, $permission->name);
                }

                foreach ($user->abilities as $ability) {
                    array_push($abilities, $ability->name);
                }

                if (in_array('Admin', $permissions) || in_array('Developer', $permissions)) {
                    $authencation['id']         = $user->id;
                    $authencation['name']       = $user->name;
                    $authencation['email']      = $user->email;
                    $authencation['username']   = $user->username;

                    $this->session->set_userdata('user', $authencation);
                    $this->session->set_userdata('permissions', $permissions);
                    $this->session->set_userdata('abilities', $abilities);

                    return true;
                }  else {
					$this->form_validation->set_message('check_database', 'U hebt geen rechten om hier in te loggen.');
                    $this->session->set_flashdata('class', 'alert alert-danger');
                    $this->session->set_flashdata('message', 'U hebt geen rechten om hier in te loggen');

                    return false;
                }
            }
        } else {
			$this->session->set_flashdata('class', 'alert alert-danger');
			$this->session->set_flashdata('message', 'Wrong credentials given.');

			$this->form_validation->set_message('check_database', 'Foutieve login gegevens.');

			return false;
		}
    }
}
