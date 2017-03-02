<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'front';

$route['wp-login'] = 'adm_login';

//category
$route['food'] = 'front/category/101';
$route['drink'] = 'front/category/102';

//
$route['index'] = 'front';
$route['menu'] = 'front/menu';
$route['meja'] = 'front/meja';
$route['cart'] = 'front/cart';
$route['login'] = 'front/login';
$route['logout'] = 'front/logout';
$route['verifikasi'] = 'front/verifikasi';
$route['register'] = 'front/register';
$route['registered'] = 'front/register_success';
$route['ceklogin'] = 'front/ceklogin';
$route['search'] = 'front/search';
$route['checkout'] = 'front/checkout';
$route['guestbook'] = 'front/guest_book';

//menu detail
$route['detail/(:any)'] = 'front/menu_detail/$1';
$route['remove/(:any)'] = 'front/remove/$1';
$route['add/(:any)'] = 'front/add/$1';
$route['update'] = 'front/update';

//Error 404
$route['404_override'] = 'err_404';

$route['translate_uri_dashes'] = FALSE;


/* End of file routes.php */
/* Location: ./application/config/routes.php */