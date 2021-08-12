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

$route['default_controller'] = 'Mams'; //Application started with from this controller
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// !!------------- Default Routes (Default)  ----------------------!!


$route['signin'] = 'Mams/signin';
$route['signin_submit'] = 'Mams/signin_submit';
$route['signout'] = 'Mams/signout';





// !!------------- Manager Routes (Default)  ----------------------!!
$route['home'] = 'Index'; //here Index is chk from home
$route['file'] = 'File'; //here File is controller
$route['file/create'] = 'File/create';
$route['file/delete/(:num)'] = 'File/delete';
$route['file/edit/(:num)'] = 'File/edit';

$route['clients'] = 'Clients'; //here Clients is controller
$route['clients/create'] = 'Clients/create';
$route['clients/delete/(:num)'] = 'Clients/delete';
$route['clients/edit/(:num)'] = 'Clients/edit';

$route['appraisers'] = 'Appraisers'; //here Appraisers is controller
$route['appraisers/create'] = 'Appraisers/create';
$route['appraisers/delete/(:num)'] = 'Appraisers/delete';
$route['appraisers/edit/(:num)'] = 'Appraisers/edit';

$route['search'] = 'Search';




// !!------------- Appraiser Routes  ----------------------!!
$route['appraiserpages'] = 'appraiserpages/Index'; //here appraiserpages is folder -> Index is controller
$route['appraiserpages/file'] = 'appraiserpages/File';








// !!------------- Owner Routes  ----------------------!!
$route['ownerpages'] = 'ownerpages/Index'; //here ownerpages is folder -> Index is controller
$route['ownerpages/file'] = 'ownerpages/File';
