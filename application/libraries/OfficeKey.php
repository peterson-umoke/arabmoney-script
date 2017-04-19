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

	/**
	 * [login description]
	 * @param  [type] $identity [description]
	 * @param  [type] $pwd      [description]
	 * @return boolean           [description]
	 */
	public function login($identity,$pwd) {
		if($this->officekey_model->login($identity,$pwd)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * logged_in
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function logged_in()
	{
        return $this->officekey_model->recheck_session();
	}

	/**
	 * [create_backoffice_user description]
	 * @param  [type] $first_name      [description]
	 * @param  [type] $last_name       [description]
	 * @param  [type] $identity        [description]
	 * @param  [type] $password        [description]
	 * @param  [type] $mobile          [description]
	 * @param  array  $additional_data [description]
	 * @return [type]                  [description]
	 */
	public function create_backoffice_user($first_name, $last_name, $identity, $password,$mobile, $additional_data = array()) {
		$this->officekey_model->create_office_user("backoffice",$first_name,$last_name,$identity,$password,$mobile,$additional_data);

		return TRUE;
	}

	/**
	 * [create_frontoffice_user description]
	 * @param  [type] $first_name      [description]
	 * @param  [type] $last_name       [description]
	 * @param  [type] $identity        [description]
	 * @param  [type] $password        [description]
	 * @param  [type] $mobile          [description]
	 * @param  array  $additional_data [description]
	 * @return [boolean]                  [description]
	 */
	public function create_frontoffice_user($first_name, $last_name, $identity, $password,$mobile, $additional_data = array()) {
		$this->officekey_model->create_office_user("frontoffice",$first_name,$last_name,$identity,$password,$mobile,$additional_data);

		return TRUE;
	}

	/**
	 * [is_backoffice_user description]
	 * @param  [type]  $table_name [description]
	 * @param  boolean $id         [description]
	 * @return boolean             [description]
	 */
	public function is_backoffice_user() {
		$account_type = strtolower($this->session->userdata("account_type"));
		$user_id = $this->session->userdata("user_id");

		if($account_type == "backoffice_users" && $this->logged_in()) {
			return $this->officekey_model->does_user_exist($account_type,$user_id);
		}
	}

	/**
	 * [is_frontoffice_user description]
	 * @param  [type]  $table_name [description]
	 * @param  boolean $id         [description]
	 * @return boolean             [description]
	 */
	public function is_frontoffice_user() {
		$account_type = strtolower($this->session->userdata("account_type"));
		$user_id = $this->session->userdata("user_id");

		if($account_type == "frontoffice_users" && $this->logged_in()) {
			return $this->officekey_model->does_user_exist($account_type,$user_id);
		}
	}

	public function user($id = NULL) {
		$id = $this->session->userdata("user_id");
		return $this->officekey_model->edit_office_user($id);
	}

	public function update_frontoffice_user($id,$data = array(),$table = "frontoffice") {
		$this->officekey_model->update_office_user($id,$data,$table);

		return true;
	}

	public function update_backoffice_user($id,$data = array(),$table = "backoffice") {
		$this->officekey_model->update_office_user($id,$data,$table);

		return true;
	}

	public function change_password($id,$old_password = "",$new_password="",$table_name = "frontoffice"){
		$query = $this->officekey_model->edit_office_user($id,$table_name);

		// password
		$password_db = $query['password'];

		if(password_verify($old_password,$password_db)){
			// convert the new password to the required hash
			$new_password = password_hash($new_password,$this->config->item("hashing_method"));

			// send the new password to be updated
			$this->update_frontoffice_user($id,array("password" => $new_password));
			return true;
		} else {
			$this->session->set_flashdata("change_password_messages","The Current Password You entered does not match with the one in the database, try again!");
			return false;
		}
	}

	public function check_if_user_exist($email = NULL) {
		$query = $this->officekey_model->check_user_email($email);

		if($query) {
			return true;
		} else {
			return false;
		}
	}
 
	/**
	 * [_debug_result description]
	 * @param  array  $args [description]
	 * @return [html]       [description]
	 */
	public function _debug_result($args = array()) {
		echo "<pre>".PHP_EOL;
		print_r($args);
		echo "</pre>".PHP_EOL;
	}
}