<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['signup'] = 'Signup';
$route['login'] = 'login';
$route['user/add'] = 'User/addFlatRoom';
$route['user/add/flat'] = 'User/addFlat';
$route['user/add/room'] = 'User/addRoom';
$route['home/user'] = 'Home/user_view';
$route['home/search'] = 'Home/home_search';
$route['logout'] = 'Login/logout';
$route['room/(:num)'] = 'Home/getRoom/$1';
$route['flat/(:num)'] = 'Home/getFlat/$1';
$route['profile'] = 'User/userProfile';

$route['default_controller'] = 'Home';
$route['404_override'] = '';
// $route['404_override'] = 'MyCustom404';
$route['translate_uri_dashes'] = FALSE;