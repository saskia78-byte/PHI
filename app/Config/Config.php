<?php
namespace App\Config;

define('ROOT', dirname(dirname(__DIR__)));
define('URL_ROOT_ADMIN', 'http://localhost/PHI/admin');
define('URL_ROOT_PUBLIC', 'http://localhost/PHI/public');
define('SITE_NAME', 'PHI - Pharmacie Humanitaire Internationale');
define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

define('DB_HOST', 'localhost');
define('DB_NAME', 'phi');
define('DB_USER', 'user1');
define('DB_PASS', 'user1');
define('DB_CHARSET', 'utf8mb4');
?>