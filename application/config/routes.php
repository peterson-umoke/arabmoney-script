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
$route['default_controller'] = 'guest_homepage/welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// backoffice routes
$route['backoffice'] = "backoffice/dashboard";
$route['backoffice/login'] = "backoffice/account/login";
$route['backoffice/forgot_password'] = "backoffice/account/forgot_password";
$route['backoffice/logout'] = "backoffice/account/logout";

// set special url for the guest views
$route['contact'] = "guest_homepage/contact";
$route['about'] = "guest_homepage/about";
$route['login'] = "frontoffice/account/login";
$route['check-login'] = "guest_homepage/check_login";
$route['register'] = "guest_homepage/register";
$route['create_user'] = "guest_homepage/create_user";
$route['faq'] = "guest_homepage/faq";
$route['view-blog'] = "guest_homepage/view_blog";
$route['(.*)/(.*)/register'] = "guest_homepage/register";
$route['privacy-policy'] = "guest_homepage/privacy_policies";
$route['privacy-policies'] = "guest_homepage/privacy_policies";
$route['terms-and-conditions'] = "guest_homepage/terms_and_conditions";
$route['account/login'] = "guest_homepage/login";
$route['account/register'] = "guest_homepage/register";
$route['account/forgot_password'] = "guest_homepage/forgot_password";
$route['account/change_password'] = "guest_homepage/change_password";

// frontoffice routes
$route['frontoffice/logout'] = "account/logout";
$route['frontoffice/dashboard/welcome'] = "frontoffice/dashboard";
$route['frontoffice'] = "frontoffice/dashboard";
$route['frontoffice/welcome'] = "frontoffice/dashboard";
$route['frontoffice/(.*)/add_new_testimonial'] = "frontoffice/testimonies/add_new_testimonial";
$route['frontoffice/donation/index'] = "frontoffice/donation/make";
$route['frontoffice/donation/(:num)'] = "frontoffice/donation/make/$1";
$route['frontoffice/dashboard/(:num)'] = "frontoffice/dashboard/index/$1";