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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/auth';
$route['register'] = 'admin/auth/registration';
$route['user'] = 'admin/user';
$route['datauser'] = 'admin/user_data/edit';
$route['edit'] = 'admin/user_data/edit';
$route['slide'] = 'admin/slider';
$route['slideredit'] = 'admin/slider/edit_slider';
$route['prosesedit'] = 'admin/slider/proses_editSlider';
$route['sliderhapus'] = 'admin/slider/sliderhapus';

$route['usermanagement'] = 'admin/user_data';
$route['deleteuser'] = 'admin/user_data/hapususer';
$route['changepassword'] = 'admin/user_data/changepassword';

$route['partner'] = 'admin/partner';
$route['partneredit'] = 'admin/partner/edit_partner';
$route['p_editpartner'] = 'admin/partner/proses_editpartner';
$route['partnerhapus'] = 'admin/partner/partnerhapus';

$route['news'] = 'admin/news';
$route['added'] = 'admin/news/addnews';
$route['newsedit'] = 'admin/news/edit_berita';
$route['p_editberita'] = 'admin/news/p_editberita';
$route['newshapus'] = 'admin/news/hapusberita';

$route['pencipta'] = 'admin/pencipta';
$route['penciptaedit'] = 'admin/pencipta/edit_pencipta';
$route['p_editpencipta'] = 'admin/pencipta/p_editpencipta';
$route['hapuspencipta'] = 'admin/pencipta/hapuspencipta';
$route['uploadpencipta'] = 'admin/pencipta/upload';

$route['song'] = 'admin/song';
$route['songedit'] = 'admin/song/edit_song';
$route['p_editsong'] = 'admin/song/p_editsong';
$route['hapuslagu'] = 'admin/song/hapuslagu';


$route['home'] = 'welcome/balik';
$route['catalogue'] = 'welcome/view_cata';
$route['informasi'] = 'welcome/informasi';


