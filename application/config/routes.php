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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'index';
$route['404_override'] = 'index/handle_404';
$route['translate_uri_dashes'] = TRUE;
$route['textures']='index/textures';
$route['textures/(:any)']='index/textures/$1';
$route['stencils']='index/stencils';
$route['stencils/(:any)']='index/stencils/$1';
$route['reviews']='index/reviews';
$route['services']='index/services';
$route['contact']='index/contact';
$route['paints']='index/paints';
$route['(:any)paints']='index/paints';
$route['faq']='index/faq';
$route['contactus']='index/contactus';
$route['testimonials']='index/reviews';

#routes for the required project
$route['applyForTranscript']='index/applyForTranscript';
$route['viewStatus']='index/viewStatus';
$route['basicInformation'] = 'index/basicInformation';
$route['transactionStatus']= 'index/transactionStatus';
$route['check'] = 'index/check';
$route['viewRequests']='index/viewRequests';
$route['editRequests']='index/editRequests';
$route['updateRequest']='index/updateRequest';
$route['applicationForm']='index/applicationForm';

$route['paintcost']='index';
$route['asianpaint']='index/paints';
