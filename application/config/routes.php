<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['sign-in'] = 'auth/signIn';
$route['sign-up'] = 'auth/registration';


// administrator //

// Users
$route['admin'] = 'admin/dashboard';
$route['data-admin'] = 'admin/user/getAdmin';
$route['role'] = 'admin/user/role';
$route['customer'] = 'admin/user/customer';
$route['add-customer'] = 'admin/user/customer/add';
$route['add-role'] = 'admin/user/role/add';
$route['add-administration'] = 'admin/user/getAdmin/add';
$route['get-administration'] = 'admin/user/getAdmin';

// category
$route['category'] = 'admin/category';
$route['add-category'] = 'admin/category/index/add';

// product
$route['product'] = 'admin/product';
$route['add-product'] = 'admin/product/add';
$route['edit-product/(:any)'] = 'admin/product/edit/$1';
$route['a-detail-product/(:any)'] = 'admin/product/detailProduct/$1';

// variant
$route['sub-variant'] = 'admin/variant/subVariant';
$route['add-sub-variant'] = 'admin/variant/subVariant/add';
$route['edit-sub-variant/(:any)'] = 'admin/variant/subVariant/edit/$1';
$route['generate-variant/(:any)'] = 'admin/product/generate/$1';
$route['add-variant/(:any)'] = 'admin/variant/addVariant/$1';

// brand 
$route['a-brand'] = 'admin/brand';
$route['add-brand'] = 'admin/brand/index/add';
$route['edit-brand/(:any)'] = 'admin/brand/index/edit/$1';

// order
$route['not-yet-paid'] = 'admin/transaction/notYetPaid';
$route['being-processed'] = 'admin/transaction/beingProcessed';
$route['on-delivery'] = 'admin/transaction/onDelivery';
$route['order-finished'] = 'admin/transaction/finished';
$route['a-detail-order/(:any)'] = 'admin/transaction/detailOrder/$1';

// web config
$route['web-config'] = 'admin/web_config';

// end administrator //

// category
$route['category/(:any)'] = 'home/category/$1';

// product
$route['detail-product/(:any)'] = 'home/detailProduct/$1';

// order
$route['my-order'] = 'order/my_order';
