<?php

require "../lib/Api.php";
require "../lib/Application.php";
require "../lib/Request.php";
require "../lib/Response.php";
require "../lib/User.php";

# Init API
\Siberian\Api::init("http://www.siberiancms.dev", "dev@xtraball.com", "dumber31");

# Create user
$response = \Siberian\User::create("anders@xtraball.com", "dumber31");