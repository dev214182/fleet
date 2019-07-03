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

// @jacob
// $route['default_controller'] = 'welcome';
// $route['api/sys/(:any)'] = 'back/General_callbacks/view/$1';  
// $route['api/vw/(:any)'] = 'back/Viewing_callbacks/view/$1';  
// $route['client'] = 'back/General_pages';  
// $route['client/page'] = 'back/General_pages'; 
// $route['compress/cache'] = 'back/Compress/clear_cache'; 
// $route['client/page/(:any)'] = 'back/General_pages/view/$1'; 
// $route['client/page/(:any)/(:any)'] = 'back/Page_lists/view/$1/$2'; 
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;


// @mel
$route['default_controller'] = 'pages/view';
$route['api/sys/(:any)'] = 'back/General_callbacks/view/$1';  
$route['api/vw/(:any)'] = 'back/Viewing_callbacks/view/$1';  
$route['client'] = 'back/General_pages';  
$route['client/page'] = 'back/General_pages'; 
$route['compress/cache'] = 'back/Compress/clear_cache'; 
$route['client/page/(:any)'] = 'back/General_pages/view/$1'; 
$route['client/page/(:any)/(:any)'] = 'back/Page_lists/view/$1/$2'; 
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// $route['default_controller'] = 'pages/view';
$route['login']  = 'front/Login'; 
$route['login/new']  = 'front/Login/newUser'; 
$route['log/verify'] = 'front/Login/verification';
$route['log/logout'] = 'front/Login/logout';
// $route['admin'] = 'back/General_pages';
// $route['admin/callback/(:any)'] = 'back/General_callbacks/view/$1';
// $route['admin/(:any)'] = 'back/General_pages/view/$1'; 
// $route['admin/settings/(:any)'] = 'back/Settings/view/$1';
// $route['admin/(:any)/(:any)'] = 'back/General_addlinks/view/$1/$2';
$route['public/callback/(:any)'] = 'front/General_pages/$1';
$route['(:any)'] = 'pages/view/$1';
// $route['404_override'] = 'errors/show_404';
// $route['translate_uri_dashes'] = FALSE;