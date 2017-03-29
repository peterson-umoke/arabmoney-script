<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// backoffice routes
$route['backoffice'] = "backoffice/account/login";
$route['backoffice/login'] = "backoffice/account/login";
$route['backoffice/forgot_password'] = "backoffice/account/forgot_password";
$route['backoffice/logout'] = "backoffice/account/logout";

// set special url for the guest views
$route['contact-us'] = "welcome/contact_us";
$route['about-us'] = "welcome/about_us";
$route['login'] = "welcome/login";
$route['register'] = "welcome/register";
$route['privacy-policy'] = "welcome/privacy_policies";
$route['privacy-policies'] = "welcome/privacy_policies";
$route['terms-and-conditions'] = "welcome/terms_and_conditions";
$route['account/login'] = "welcome/login";
$route['account/register'] = "welcome/register";
$route['account/forgot_password'] = "welcome/forgot_password";
$route['account/change_password'] = "welcome/change_password";
$route['account/logout'] = "welcome/logout";
$route['index.html'] = "welcome/index";

// frontoffice routes
$route['frontoffice/logout'] = "welcome/logout";
$route['frontoffice/account/logout'] = "welcome/logout";
$route['frontoffice/account/login'] = "welcome/login";
$route['frontoffice/dashboard/welcome'] = "frontoffice/dashboard";
$route['frontoffice'] = "frontoffice/dashboard";
$route['frontoffice/welcome'] = "frontoffice/dashboard/welcome";
$route['frontoffice/account/complete_profile'] = "frontoffice/dashboard/account_setup";
$route['frontoffice/account/edit/(:num)'] = "frontoffice/dashboard/account_setup";
$route['frontoffice/all-transactions'] = "frontoffice/dashboard/list_transactions";
$route['frontoffice/transactions/all-transactions'] = "frontoffice/dashboard/list_transactions";
$route['frontoffice/settings'] = "frontoffice/dashboard/general_settings";
$route['frontoffice/settings/general'] = "frontoffice/dashboard/general_settings";
$route['frontoffice/settings/advanced_settings'] = "frontoffice/dashboard/advanced_settings";