<?php

# List applications for push
printf("Listing applications \n");
$list = \Siberian\Push::listApps();
if($list->isSuccess()) {
    printf("Success: %s \n", print_r($list->getResponse(), true));

    $applications = $list->getResponse("applications");

    $checked = [];
    foreach ($applications as $application) {
        $appId = $application['app_id'];
        $checked[$appId] = true;
    }
    var_dump($checked);
} else {
    throw new Exception(sprintf("Error: %s \n", $list->getErrorMessage()));
}

/**
 * Do not send push in test unless dry_run is enabled.
 *
 */
if ($pushTest) {
    printf("Sending push \n");
    $send = \Siberian\Push::send("Title", "Message", $applications, false, "all", false, null);
    if($send->isSuccess()) {
        printf("Success: %s \n", print_r($send->getResponse(), true));
    } else {
        throw new Exception(sprintf("Error: %s \n", $send->getErrorMessage()));
    }
} else {
    printf("Push test is disabled by default to prevent unwanted push notifications to be sent. \n");
}