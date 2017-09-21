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

$email = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10)."@domain.com";
$password = "dummy_password";

# Create user
printf("Creating user \n");
$create = \Siberian\User::create($email, $password, "Jane", "Dalton");
if($create->isSuccess()) {
    printf("Success: %s \n", print_r($create->getResponse(), true));

    $user_id = $create->getResponse("user_id");
} else {
    throw new Exception(sprintf("Error: %s \n", $create->getErrorMessage()));
}

# Update user
printf("Updating user \n");
$update = \Siberian\User::update($user_id, null, null, "John", "Doe");
if($update->isSuccess()) {
    printf("Success: %s \n", print_r($update->getResponse(), true));
} else {
    throw new Exception(sprintf("Error: %s \n", $update->getErrorMessage()));
}

# Exists user
printf("User exists \n");
$exists = \Siberian\User::exist($email);
if($exists->isSuccess()) {
    printf("Success: %s \n", print_r($exists->getResponse(), true));
} else {
    throw new Exception(sprintf("Error: %s \n", $exists->getErrorMessage()));
}

# Authenticate user
printf("Authenticate user \n");
$authenticate = \Siberian\User::authenticate($email, $password);
if($authenticate->isSuccess()) {
    printf("Success: %s \n", print_r($authenticate->getResponse(), true));
} else {
    throw new Exception(sprintf("Error: %s \n", $authenticate->getErrorMessage()));
}

# Forgot password, this action can fail non-linked to the API (SMTP, Mail, etc ...)
try {
    printf("Forgot password \n");
    $forgotpassword = \Siberian\User::forgotpassword($email);
    if($forgotpassword->isSuccess()) {
        printf("Success: %s \n", print_r($forgotpassword->getResponse(), true));
    } else {
        throw new Exception(sprintf("Error: %s \n", $forgotpassword->getErrorMessage()));
    }
} catch (Exception $e) {
    printf("Error: %s \n", $e->getMessage());
}

