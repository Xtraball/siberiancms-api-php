#!/usr/bin/env php

<?php

    $pushTest = false;
    $backofficeTest = true;

    require "./lib/Api.php";
    require "./lib/Application.php";
    require "./lib/Request.php";
    require "./lib/Response.php";
    require "./lib/User.php";
    require "./lib/Push.php";
    require "./lib/Backoffice.php";

    require "./tests/user.php";
    require "./tests/application.php";
    require "./tests/backoffice.php";
    require "./tests/push.php";
