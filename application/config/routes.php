<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default route
$route['default_controller'] = 'auth/login';

// Authentication routes
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// Main application routes
$route['dashboard'] = 'dashboard';
$route['profile'] = 'profile';
$route['users'] = 'users';

// Profile specific routes
$route['profile/update'] = 'profile/update';
$route['profile/upload_image'] = 'profile/upload_image';
$route['profile/delete_image'] = 'profile/delete_image';

// Users management routes (for admin)
$route['users/create'] = 'users/create';
$route['users/update'] = 'users/update';
$route['users/delete'] = 'users/delete';
$route['users/get_user'] = 'users/get_user';

// API routes (if needed)
$route['api/users'] = 'api/users';
$route['api/profile'] = 'api/profile';

// Redirect shortcuts
$route['home'] = 'dashboard';
$route['admin'] = 'users';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
?>
