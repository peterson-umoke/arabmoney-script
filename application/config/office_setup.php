<?php defined("BASEPATH") or die("NO DIRECT SCRIPT CAN BE CALLED");

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


/**
* =====================
* Application Setups
* =====================
*/
$config['site_name'] = "arabnaira";
$config['number_of_admins'] = 2;
$config['number_of_frontoffice_users'] = -1;
$config['maintenance_mode'] = FALSE;
$config['full_site_lockdown'] = FALSE;

/**
 * ====================
 * CDN Setup
 * ====================
 */
$config['use_cdn'] = FALSE; // this takes all the major resources from the server
$config['cdn_javscripts'] = "https://cdn.jsdelivr.net/g/jquery@3.1.1,jquery.migrate@1.4.1,wow@1.1.2,bootstrap@3.3.7,jquery.easing@1.3(jquery.easing.1.3.min.js),icheck@1.0.2,tinymce@4.1.2(jquery.tinymce.min.js),jquery.datatables@1.10.10(js/jquery.dataTables.min.js+js/dataTables.bootstrap.min.js),jgrowl@1.3.0,modernizr@3.3.1";
$config['cdn_stylesheets'] = "https://cdn.jsdelivr.net/g/animatecss@3.5.2,bootstrap@3.3.7(css/bootstrap.min.css),fontawesome@4.7.0,jquery.datatables@1.10.10(css/dataTables.bootstrap.min.css+css/jquery.dataTables.min.css),jgrowl@1.3.0(jquery.jgrowl.min.css)";

/**
* =====================
* Security
* =====================
*/
$config['hashing_method'] = PASSWORD_DEFAULT;

/**
* =====================
* Authentication setup
* =====================
*/
$config['admin_email'] = ["umoke10@hotmail.com","admin@admin.com"];
$config['default_group'] = "frontoffice_users"; // what is the default group for registered user
$config['identity'] = "email"; // this setup has two values : 'email' or 'username'
$config['min_password_length']        = 8;                   // Minimum Required Length of Password
$config['max_password_length']        = 20;                  // Maximum Allowed Length of Password
$config['email_activation']           = FALSE;               // Email Activation for registration
$config['manual_activation']          = FALSE;               // Manual Activation for registration
$config['remember_users']             = TRUE;                // Allow users to be remembered and enable auto-login
$config['user_expire']                = 86500;               // How long to remember the user (seconds). Set to zero for no expiration
$config['user_extend_on_login']       = FALSE;               // Extend the users cookies every time they auto-login
$config['track_login_attempts']       = TRUE;               // Track the number of failed login attempts for each user or ip.
$config['track_login_ip_address']     = TRUE;                // Track login attempts by IP Address, if FALSE will track based on identity. (Default: TRUE)
$config['maximum_login_attempts']     = 3;                   // The maximum number of failed login attempts.
$config['lockout_time']               = 600;                 // The number of seconds to lockout an account due to exceeded attempts
$config['forgot_password_expiration'] = 0;                   // The number of milliseconds after which a forgot password request will expire. If set to 0, forgot password requests will not expire.

/*
 | -------------------------------------------------------------------------
 | Cookie options.
 | -------------------------------------------------------------------------
 | remember_cookie_name Default: remember_code
 | identity_cookie_name Default: identity
 */
$config['remember_cookie_name'] = 'remember_code';
$config['identity_cookie_name'] = 'identity';

/*
 | -------------------------------------------------------------------------
 | Email options.
 | -------------------------------------------------------------------------
 | email_config:
 | 	  'file' = Use the default CI config or use from a config file
 | 	  array  = Manually set your email config settings
 */
$config['use_ci_email'] = FALSE; // Send Email using the builtin CI email class, if false it will return the code and the identity
$config['email_config'] = array(
	'mailtype' => 'html',
);

/*
 | -------------------------------------------------------------------------
 | Message Delimiters.
 | -------------------------------------------------------------------------
 */
$config['delimiters_source']       = 'config'; 	// "config" = use the settings defined here, "form_validation" = use the settings defined in CI's form validation library
$config['message_start_delimiter'] = '<p>'; 	// Message start delimiter
$config['message_end_delimiter']   = '</p>'; 	// Message end delimiter
$config['error_start_delimiter']   = '<p>';		// Error message start delimiter
$config['error_end_delimiter']     = '</p>';	// Error message end delimiter
