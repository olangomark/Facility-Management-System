<?php

$env = 'production';
if (is_file(__DIR__ . '/.env')) {
    $env_file = trim(file_get_contents(__DIR__ . '/.env'));
    $env = (empty($env_file) ? $env : $env_file);
}

define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : $env);

switch (ENVIRONMENT) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        break;

    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>=')) {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
        break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1);
}

$system_path = 'application/vendor/codeigniter/framework/system';

$application_folder = 'application';

$view_folder = '';

define('BASEPATH', $system_path . DIRECTORY_SEPARATOR);

define('APPPATH', $application_folder . DIRECTORY_SEPARATOR);

define('VIEWPATH', ($view_folder == '' ? APPPATH . 'views' . DIRECTORY_SEPARATOR : $view_folder . DIRECTORY_SEPARATOR));

require_once BASEPATH . 'core/CodeIgniter.php';
