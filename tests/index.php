<?php

require "../lib/Api.php";
require "../lib/Application.php";
require "../lib/Request.php";
require "../lib/Response.php";
require "../lib/User.php";

# Init API
\Siberian\Api::init("http://www.siberiancms.dev", "dummy", "tGuiJJMbEdeNBTTAt5V1dM2l0JbY5zLk");

# Create user
$response = \Siberian\User::create("anders@xtraball.com", "dumber31");
if($response->isSuccess()) {
    printf("Success: %s \n", print_r($response->getResponse(), true));

} else {
    printf("Error: %s \n", $response->getErrorMessage());
}