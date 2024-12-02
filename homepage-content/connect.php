<?php
// Determine the environment based on the presence of SERVER_NAME
if (php_sapi_name() === 'cli' || empty($_SERVER['SERVER_NAME'])) {
    // Default to local settings for CLI execution
    $host = 'localhost';
    $db_name = 'sliderDB';
    $username = 'root';
    $password = '';
} elseif ($_SERVER['SERVER_NAME'] === 'localhost') {
    // Web server on local environment
    $host = 'localhost';
    $db_name = 'sliderDB';
    $username = 'root';
    $password = '';
} else {
    // Web server on production environment (Hostinger or others)
    $host = 'your_hostinger_host';
    $db_name = 'your_hostinger_db_name';
    $username = 'your_hostinger_username';
    $password = 'your_hostinger_password';
}
