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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Monitor';
$route['404_override'] = 'Error/error_404';
$route['translate_uri_dashes'] = FALSE;

$route['login/check'] = 'authorization/login';
$route['login'] = 'authorization';
$route['logout'] = 'authorization/logout';
//pelanggan
$route['pelanggan'] = 'Pelanggan/index';
$route['tambah_pelanggan'] = 'Pelanggan/addPelanggan';
$route['insert_pelanggan'] = 'Pelanggan/insertPelanggan';
$route['edit_pelanggan/(:num)'] = 'Pelanggan/editPelanggan/$1';
$route['update_pelanggan'] = 'Pelanggan/updatePelanggan';
$route['hapus_pelanggan/(:num)'] = 'Pelanggan/deletePelanggan/$1';
$route['check_out/(:num)'] = 'Pelanggan/check_out/$1';


//kamar
$route['kamar'] = 'Kamar/index';
$route['tambah_kamar'] = 'kamar/addKamar';
$route['insert_kamar'] = 'kamar/insertkamar';
$route['edit_kamar/(:num)'] = 'kamar/editKamar/$1';
$route['update_kamar'] = 'kamar/updateKamar';
$route['hapus_kamar/(:num)'] = 'kamar/deleteKamar/$1';
//Meter
$route['tambah_meter'] = 'Meter/addMeter';
$route['insert_meter'] = 'Meter/insertMeter';
$route['edit_meter/(:num)'] = 'Meter/editMeter/$1';
$route['update_meter'] = 'Meter/updateMeter';
$route['delete_meter/(:num)'] = 'Meter/deleteMater/$1';
//autodebet
$route['tambah_debet'] = 'autodebet/addDebet';
$route['insert_debet'] = 'autodebet/insertdebet';
$route['edit_debet/(:num)'] = 'autodebet/editDebet/$1';
$route['update_debet'] = 'autodebet/updateDebet';
$route['hapus_debet/(:num)'] = 'autodebet/deleteDebet/$1';
//subsidi
$route['tambah_subsidi'] = 'subsidi/addSubsidi';
$route['insert_subsidi'] = 'subsidi/insertSubsidi';
$route['edit_subsidi/(:num)'] = 'Subsidi/editSubsidi/$1';
$route['hapus_subsidi/(:num)'] = 'subsidi/deleteSubsidi/$1';
$route['update_subsidi'] = 'subsidi/updateSubsidi';
//Deposit

// $route['tambah_deposit'] = 'Deposit/addDeposit';
// $route['insert_deposit'] = 'Deposit/insertDeposit';
// $route['edit_deposit/(:num)'] = 'Deposit/editDeposit/$1';
// $route['update_deposit'] = 'Deposit/updateDeposit';
// $route['delete_deposit/(:num)'] = 'Deposit/deleteDeposit/$1';