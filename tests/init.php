<?php
# Init API
$error = false;
if (!isset($argv[1])) {
    echo "Siberian API URL is missing \n";
    $error = true;
}

if (!isset($argv[2])) {
    echo "Auth type is required \n";
    $error = true;
}

switch ($argv[2]) {
    case 'basic':
            if(!isset($argv[3])) {
                echo "Username is required \n";
                $error = true;
            }
            if(!isset($argv[4])) {
                echo "Password is required \n";
                $error = true;
            }
        break;
    case 'bearer':
            if(!isset($argv[3])) {
                echo "Bearer token is required \n";
                $error = true;
            }
        break;
    default:
        echo "Auth type must be basic or bearer \n";
        $error = true;
}

if ($error) {
    die('');
}

switch ($argv[2]) {
    case 'basic':
            \Siberian\Api::init($argv[1], $argv[3], $argv[4]);
        break;
    case 'bearer':
            \Siberian\Api::initWithBearer($argv[1], $argv[3]);
        break;
}