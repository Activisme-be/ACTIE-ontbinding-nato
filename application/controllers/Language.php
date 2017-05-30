<?php 

/**
 * Class Language
 */
class Language extends MY_Controller 
{
    public $user        = []; 
    public $permissions = []; 
    public $abilities   = []; 
    public $language    = [];

	/**
	 * Language constructor.
	 */
    public function __construct() 
    {
        parent::__construct(); 

        $this->load->library(['session']);
        $this->load->helper(['url']);

		$this->user        = $this->session->userdata('user');
		$this->abilities   = $this->session->userdata('abilities');
		$this->permissions = $this->session->userdata('permissions');
		$this->language    = $this->session->userdata('language');
    }

	/**
	 * @var array
	 */
	protected static $supportedLanguages = ['dutch', 'english', 'french'];

    public function set() 
    {
		$input = ($this->uri->segment(3)) ?: $this->session->userdata('language');
		$this->setSupportedLanguage($input);

		return redirect($_SERVER['HTTP_REFERER']);
    }

	/**
	 * @param string $lang
	 *
	 * @return bool
	 */
	private function isLanguageSupported($lang)
	{
		return in_array($lang, self::$supportedLanguages);
	}

	/**
	 * @param string $lang
	 */
	private function setSupportedLanguage($lang)
	{
		if ($this->isLanguageSupported($lang)) {
			$data['language'] = $lang;

			$this->session->set_userdata('language', $data);
		}
	}
}
