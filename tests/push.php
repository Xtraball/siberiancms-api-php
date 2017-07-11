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

# List applications for push
printf("Listing applications \n");
$list = \Siberian\Push::listApps();
if($list->isSuccess()) {
    printf("Success: %s \n", print_r($list->getResponse(), true));

    $applications = $list->getResponse("applications");

    $applications = array_flip($applications);
    $applications = array_map(function($val) {
        return true;
    }, $applications);
} else {
    throw new Exception(sprintf("Error: %s \n", $list->getErrorMessage()));
}

printf("Sending push \n");
$send = \Siberian\Push::send("Title", "Message", $applications, false, "all", false);
if($send->isSuccess()) {
    printf("Success: %s \n", print_r($send->getResponse(), true));
} else {
    throw new Exception(sprintf("Error: %s \n", $send->getErrorMessage()));
}
