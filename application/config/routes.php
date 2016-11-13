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

$route['default_controller'] = "default/home";
$route['404_override'] = 'admin/error';
//-------
$route['system']="admin/verify/login";
$route['system/(:any)']="admin/$1";
$route['backup']="admin/backup";
//http://localhost/
$route['home']="default/home/index";
$route['contact']="default/contact/index";
$route['contact/(:any)']="default/contact/$1";
$route['customer/(:any)']="default/customer/$1";
$route['about']="default/about/index";
$route['service']="default/service/index";
$route['video']="default/Video/index";
$route['blog']="default/blog/index";
$route['tracking']="default/tracking/index";
$route['news/detail/(:any)-(:num).html']='default/news/detail/$2';

$route['admin/warehouse/(:any)']="warehouse/warehouse/$1";
$route['admin/warehouse_order/(:any)']="warehouse/warehouse_order/$1";
$route['admin/devices/(:any)']="devices/devices/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */