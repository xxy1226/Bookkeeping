<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','form_validation','session','pagination');

$autoload['drivers'] = array();

$autoload['helper'] = array('url','form','security');

$autoload['config'] = array('pagination');

$autoload['language'] = array();

$autoload['model'] = array('User_m');
