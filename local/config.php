<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(

	'config' => array(
		'base_url' => 'http://localhost/cbs/',
		'log_threshold' => 1,
		'index_page' => 'index.php',
		'uri_protocol' => 'REQUEST_URI',
	),

	'database' => array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'toor',
		'password' => 'root',
		'database' => 'cbs',
		'dbdriver' => 'pdo',
		'subdriver' => 'mysql',
	),

);
