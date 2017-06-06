<?php 

/**
 * Class Language
 */
class Language extends MY_Controller 
{
    public $user        = []; /** @var array  */
    public $permissions = []; /** @var array  */
    public $abilities   = []; /** @var array  */
    public $language    = []; /** @var array  */

	/**
	 * Language constructor.
	 *
	 * @return void
	 */
    public function __construct() 
    {
        parent::__construct(); 

        $this->load->library(['session']);
        $this->load->helper(['url']);
		$this->load->helper(['url', 'language']);

		$this->user        = $this->session->userdata('user');
		$this->abilities   = $this->session->userdata('abilities');
		$this->permissions = $this->session->userdata('permissions');
		$this->language    = $this->session->userdata('language');

		// Language loading
		$this->lang->load('application', $this->language['idiom']);
    }

	/**
	 * The supported languages.
	 *
	 * @var array
	 */
	protected static $supportedLanguages = ['dutch', 'english', 'french'];

	/**
	 * Set the language to thue session.
	 *
	 * @return mixed.
	 */
    public function set() 
    {
		$input = ($this->uri->segment(3)) ?: $this->session->userdata('language');
		$this->setSupportedLanguage($input);

		return redirect($_SERVER['HTTP_REFERER']);
    }

	/**
	 * Check if the language is supported.
	 *
	 * @param  string $lang
	 * @return bool
	 */
	private function isLanguageSupported($lang)
	{
		return in_array($lang, self::$supportedLanguages);
	}

	/**
	 * Set the disered language to a session.
	 *
	 * @param  string $lang
	 * @return void
	 */
	private function setSupportedLanguage($lang)
	{
		if ($this->isLanguageSupported($lang)) {
			$data['idiom'] = $lang;

			$this->session->set_userdata('language', $data);
		}
	}
}
