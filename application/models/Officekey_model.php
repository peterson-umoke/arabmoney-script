<?php defined("BASEPATH") or die("No direct script call is allowed");

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


class Officekey_model extends CI_Model {

	protected $table_name = array(); // list the tables i will be query in through most of the time

	private $identity = ""; // the user chosen identity

	protected $pwd_strength = "";

	protected $messages;

	protected $current_table;

	protected $default_table;

    public function __construct() {
        parent::__construct();

        // load the database
        $this->load->database();

        // set the default values
        $this->identity = $this->config->item("identity");
        $this->table_name = array(
        		'backoffice' => 'backoffice_users',
        		'frontoffice' => 'frontoffice_users',
        	);
        $this->pwd_strength = $this->config->item("hashing_method");
        $this->default_table = $this->config->item("default_group");
    }

    /**
     * check_login
     * @param  string $identity
     * @param  string $pwd     
     * @return boolean
     */
    public function login($identity,$pwd) {
    	if(!isset($identity,$pwd)) {
    		// since the identity and the password are false
    		return FALSE;
    	}

    	$all_backoffice_users = $this->db->select($this->identity.',first_name,last_name,password,last_login,active,id,login_count')
    		->where($this->identity, $identity)
    		->limit(1)
    		->order_by('id', 'desc')
			->get($this->table_name['backoffice']);

		if($all_backoffice_users->num_rows() === 1) {

			// set the current user to a variable
			$single_user = $all_backoffice_users->row();
			if(password_verify($pwd,$single_user->password)){
				$newdata = array(
						'identity'             => $single_user->{$this->identity},
					    $this->identity             => $single_user->{$this->identity},
					    'email'                => $single_user->email,
					    'user_id'              => $single_user->id, //everyone likes to overwrite id so we'll use user_id
					    'old_last_login'       => $single_user->last_login,
					    'last_check'           => time(),
					    "account_type"			=> "backoffice_users",
					);
				$this->session->set_userdata($newdata);
				$this->set_message("Successfully logged in");

				$this->current_table = $this->table_name['backoffice'];
				$this->update_last_login($single_user->id,$single_user->last_login + 1);

				return true;
			} else{
				$this->set_message("Am sorry but your login has failed, please try again");
				$this->increase_login_attempts($identity);

				return false;
			}
		} else {
			$all_frontoffice_users = $this->db->select($this->identity.',first_name,last_name,password,id,login_count')
    		->where($this->identity, $identity)
    		->limit(1)
    		->order_by('id', 'desc')
			->get($this->table_name['frontoffice']);

			if($all_frontoffice_users->num_rows() === 1) {
				$single_user = $all_frontoffice_users->row();

				if(password_verify($pwd,$single_user->password)) {
					$newdata = array(
						'identity'             => $single_user->{$this->identity},
					    $this->identity             => $single_user->{$this->identity},
					    'email'                => $single_user->email,
					    'user_id'              => $single_user->id, //everyone likes to overwrite id so we'll use user_id
					    'last_check'           => time(),
					    "account_type"			=> "frontOffice_users",
						);
					$this->session->set_userdata($newdata);
					$this->set_message("Successfully logged in");
					$this->current_table = $this->table_name['frontoffice'];

					// update the current login count and the time of the user login
					$this->update_last_login($single_user->id,$single_user->login_count + 1);

					return true;
				} else {
					$this->set_message("Am sorry but your login has failed, please try again");
					$this->increase_login_attempts($identity);

					return false;
				}
			} else {
				$this->set_message("Am sorry but your login has failed, please try again");
				$this->increase_login_attempts($identity);

				return false;
			}
		}
    }

    /**
     * [create_frontoffice_user description]
     * @param  string $first_name
     * @param  string $last_name       
     * @param  string $identity        
     * @param  float $mobile               
     * @param  string $password        
     * @param  array  $additional_data 
     * @return [type]                  
     */
    public function create_office_user($table_name = array("backoffice"=>"backoffice_users","frontoffice"=>"frontoffice_users"),$first_name, $last_name, $identity, $password,$mobile, $additional_data = array()) {

    	// change the table from the option selected above
    	$this->current_table = $table_name;
    	if ($this->identity_check($identity)) // returns false if the data has been inserted before
		{
			$this->set_message('this account already exist');
			return FALSE;
		}

		// FrontOffice_users or the backoffice_users table.
		$ip_address = $this->_prepare_ip($this->input->ip_address());

		$data = array(
		    "first_name" => $first_name,
		    "last_name" => $last_name,
		    // 'username'   => $identity,
		    'ip_address' => $ip_address,
		    'mobile'	=> $mobile,
		    'password'   => password_hash($password,$this->pwd_strength),
		    $this->identity => $identity,
		    'created_on' => time(),
		);

		// filter out any data passed that doesnt have a matching column in the users table
		// and merge the set user data and the additional data
		$user_data = array_merge($this->_filter_data($this->table_name[$table_name], $additional_data), $data);

		// insert the data into the db
		$this->db->insert($this->table_name[$table_name], $user_data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE;
    }

    /**
     * [delete_office_user description]
     * @param  [type] $id    [description]
     * @param  string $table [description]
     * @return void
     */
    public function delete_office_user($id,$table = "frontoffice") {

    	$sql = array (
    			'id' => $id,
    		);

    	$this->db->delete($this->table_name[$table],$sql);

    	return TRUE;
    }

    /**
     * [update_office_user description]
     * @param  [type] $id    [description]
     * @param  array  $data  [description]
     * @param  string $table [description]
     * @return boolean
     */
     public function update_office_user($id,$data = array(),$table = "frontoffice") {

    	$this->db->udpate($this->table_name[$table],$data,"id = {$id}");

    	return TRUE;
    }

    /**
     * [list_office_users description]
     * @param  string $table
     * @return array
     */
    public function list_office_users($table= "frontoffice") {
    	return $this->db->get($this->table_name[$table])->result_array();
    }

    /**
     * [edit_office_user description]
     * @param  [type] $id    [description]
     * @param  string $table [description]
     * @return array
     */
    public function edit_office_user($id, $table="frontoffice") {
    	return $this->db->get_where($this->table_name[$table],array("id" => $id))->row_array();
    }

	/**
	 * set_message
	 *
	 * Set a message
	 *
	 * @return void
	 * @author Peterson Nwachuwku Umokw
	 **/
	public function set_message($message)
	{
		$this->messages[] = $message;

		return $message;
	}

	/**
	 * message
	 * @return array
	 */
	public function message() {
		return $this->messages;
	}

	/**
	 * ajaxify_message
	 * @return json
	 */
	public function ajaxify_message() {
		return json_encode($this->messages);
	}

	/**
	 * clear_messages
	 *
	 * Clear messages
	 *
	 * @return void
	 * @author Peterson Nwachukwu Umoke
	 **/
	public function clear_messages()
	{
		$this->messages = array();

		return TRUE;
	}

	/**
	 * update_last_login
	 *
	 * @return bool
	 * @author Peterson Nwachuwku Umoke
	 **/
	public function update_last_login($id,$login_count = NULL)
	{

		$this->load->helper('date');

		if(isset($login_count)): //  check if the login_count value is set
			$this->db->update($this->current_table, array('last_login' => time(),'login_count' => $login_count), array('id' => $id));
		else :
			$this->db->update($this->current_table, array('last_login' => time()), array('id' => $id));
		endif;

		return $this->db->affected_rows() == 1;
	}

	/**
	 * Identity check
	 *
	 * @return bool
	 * @author Mathew Vull
	 **/
	public function identity_check($identity = '')
	{

		if (empty($identity))
		{
			return FALSE;
		}

		return $this->db->where('email', $identity)
		                ->count_all_results($this->table_name[$this->current_table]) > 0;
	}

	/**
	 * increase_login_attempts
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * @param string $identity
	 **/
	public function increase_login_attempts($identity) {
		if ($this->config->item('track_login_attempts', 'ion_auth')) {
			$ip_address = $this->_prepare_ip($this->input->ip_address());
			return $this->db->insert($this->tables['login_attempts'], array('ip_address' => $ip_address, 'login' => $identity, 'time' => time()));
		}
		return FALSE;
	}

	/**
	 * [_filter_data description]
	 * @param  [type] $table [description]
	 * @param  [type] $data  [description]
	 * @return [type]        [description]
	 */
	protected function _filter_data($table, $data)
	{
		$filtered_data = array();
		$columns = $this->db->list_fields($table);

		if (is_array($data))
		{
			foreach ($columns as $column)
			{
				if (array_key_exists($column, $data))
					$filtered_data[$column] = $data[$column];
			}
		}

		return $filtered_data;
	}

	protected function _prepare_ip($ip_address) {
		// just return the string IP address now for better compatibility
		return $ip_address;
	}

	public function recheck_session($tablename = "frontOffice_users")
    {
        $recheck = (null !== $this->config->item('recheck_timer')) ? $this->config->item('recheck_timer') : 0;

        if($recheck!==0)
        {
            $last_login = $this->session->userdata('last_check');
            if($last_login+$recheck < time())
            {
                $query = $this->db->select('id')
                    ->where(array($this->identity=>$this->session->userdata('identity')))
                    ->limit(1)
                    ->order_by('id', 'desc')
                    ->get($this->tables[$tablename]);
                if ($query->num_rows() === 1)
                {
                    $this->session->set_userdata('last_check',time());
                }
                else
                {
                    $identity = $this->config->item('identity');

                    if (substr(CI_VERSION, 0, 1) == '2')
                    {
                        $this->session->unset_userdata( array($identity => '', 'id' => '', 'user_id' => '') );
                    }
                    else
                    {
                        $this->session->unset_userdata( array($identity, 'id', 'user_id') );
                    }
                    return false;
                }
            }
        }

        return (bool) $this->session->userdata('identity');
    }

    public function does_user_exist($account_type, $user_id) {
    	$query = $this->db->get_where($account_type,array("id" => $user_id),1);

    	if($query->num_rows() == 1) {
    		return true;
    	} else {
    		return false;
    	}
    }
}