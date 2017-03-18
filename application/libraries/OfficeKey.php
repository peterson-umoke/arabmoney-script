<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  OfficeKey
*
* Author: Peterson Nwachuwku Umoke
*		  pvirus.umoke@gmail.com
*         @bpviruse
*
* Added Awesomeness: Richard Nwaneri
*                    Phil Sturgeon
*                    Ben Edmunds
*
*
* Description:Just a very basic yet advanced version of the Ion Auth Framework
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/


class OfficeKey {
    public function __construct() {

        // load libaries
        $this->load->library(array('session',"email"));

        // load model
        $this->load->model("officekey_model");

        // load helpers
        $this->load->helper(array('cookie','url'));

        // load config file
        $this->config->load("office_setup",TRUE);
    }

	/**
	 * __call
	 *
	 * Acts as a simple way to call model methods without loads of stupid alias'
	 *
	 * @param $method
	 * @param $arguments
	 * @return mixed
	 * @throws Exception
	 */
	public function __call($method, $arguments)
	{
		if (!method_exists( $this->officekey_model, $method) )
		{
			throw new Exception('Undefined method OfficeKey::' . $method . '() called');
		}
		if($method == 'create_user')
		{
			return call_user_func_array(array($this, 'register'), $arguments);
		}
		if($method=='update_user')
		{
			return call_user_func_array(array($this, 'update'), $arguments);
		}
		return call_user_func_array( array($this->officekey_model, $method), $arguments);
	}

	/**
	 * __get
	 *
	 * Enables the use of CI super-global without having to define an extra variable.
	 *
	 * I can't remember where I first saw this, so thank you if you are the original author. -Militis
	 *
	 * @access	public
	 * @param	$var
	 * @return	mixed
	 */
	public function __get($var)
	{
		return get_instance()->$var;
	}

	/**
	 * logout
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function logout()
	{
		$identity = $this->config->item('identity', 'ion_auth');

        if (substr(CI_VERSION, 0, 1) == '2') {
			$this->session->unset_userdata( array($identity => '', 'id' => '', 'user_id' => '') );
        }	
        else
        {
        	$this->session->unset_userdata( array($identity, 'id', 'user_id') );
        }

		// Destroy the session
		$this->session->sess_destroy();

		//Recreate the session
		if (substr(CI_VERSION, 0, 1) == '2')
		{
			$this->session->sess_create();
		}
		else
		{
			if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
				session_start();
			}
			$this->session->sess_regenerate(TRUE);
		}

		$this->set_message('logout_successful');
		return TRUE;
	}

	public function login($identity,$pwd) {
		$this->officekey_model->login($identity,$pwd);
	}

	public function logged_in() {
		
	}

	public function create_backoffice_user($first_name, $last_name, $identity, $password,$mobile, $additional_data = array()) {
		$this->officekey_model->create_office_user("backoffice",$first_name,$last_name,$identity,$password,$mobile,$additional_data);

		return TRUE;
	}

	public function create_frontoffice_user($first_name, $last_name, $identity, $password,$mobile, $additional_data = array()) {
		$this->officekey_model->create_office_user("frontoffice",$first_name,$last_name,$identity,$password,$mobile,$additional_data);

		return TRUE;
	}

	public function _debug_result($args = array()) {
		echo "<pre>".PHP_EOL;
		print_r($args);
		echo "</pre>".PHP_EOL;
	}
}