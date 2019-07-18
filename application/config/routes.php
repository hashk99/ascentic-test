<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$route['default_controller'] = 'adminHome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['admin'] = 'adminHome';
$route['login'] = 'login';
$route['check_login'] = 'login/check'; 
$route['logout'] = 'login/out';

$route['products-create'] = 'productCreate/create';
$route['products-store'] = 'productCreate/store';

$route['products/list/(:num)'] = 'productListView/index/$1';
