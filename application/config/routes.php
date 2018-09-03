<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['banks'] = 'banks/index';
$route['cards'] = 'cards/index';
$route['test'] = 'test/index';

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
