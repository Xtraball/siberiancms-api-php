<?php

# Init API
$error = false;
if(!isset($argv[1])) {
    echo "Siberian API URL is missing \n";
    $error = true;
}

if(!isset($argv[2])) {
    echo "Username is required \n";
    $error = true;
}

if(!isset($argv[3])) {
    echo "Password is required \n";
    $error = true;
}

if($error) {
    die();
}

\Siberian\Api::init($argv[1], $argv[2], $argv[3]);

if(empty($user_id)) {
    die("Test: Cannot continue without user_id");
}

$app_name = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

# Create App
printf("Creating application \n");
$create_app = \Siberian\Application::create($app_name, $user_id);
if($create_app->isSuccess()) {
    printf("Success: %s \n", print_r($create_app->getResponse(), true));

    $app_id = $create_app->getResponse("app_id");
} else {
    throw new Exception(sprintf("Error: %s \n", $create_app->getErrorMessage()));
}

if(empty($app_id)) {
    die("Test: Cannot continue without app_id");
}

# Update App
printf("Updating application \n");
$new_name = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
$new_key = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 10);

$update_app = \Siberian\Application::update($app_id, $new_name, $new_key);
if($update_app->isSuccess()) {
    printf("Success: %s \n", print_r($update_app->getResponse(), true));
} else {
    throw new Exception(sprintf("Error: %s \n", $update_app->getErrorMessage()));
}

# Grant user
printf("Granting user \n");
$grant_user = \Siberian\Application::grant_user($app_id, $user_id);
if($grant_user->isSuccess()) {
    printf("Success: %s \n", print_r($grant_user->getResponse(), true));
} else {
    throw new Exception(sprintf("Error: %s \n", $grant_user->getErrorMessage()));
}

# Revoke user
printf("Revoking user \n");
$revoke_user = \Siberian\Application::revoke_user($app_id, $user_id);
if($revoke_user->isSuccess()) {
    printf("Success: %s \n", print_r($revoke_user->getResponse(), true));
} else {
    throw new Exception(sprintf("Error: %s \n", $revoke_user->getErrorMessage()));
}
