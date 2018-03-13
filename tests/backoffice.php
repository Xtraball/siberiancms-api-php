<?php

if ($backofficeTest) {
    # Clear cache
    printf("Backoffice clear cache \n");
    $clear_cache = \Siberian\Backoffice::clearcache();
    if($clear_cache->isSuccess()) {
        printf("Success: %s \n", print_r($clear_cache->getResponse(), true));
    } else {
        throw new Exception(sprintf("Error: %s \n", $clear_cache->getErrorMessage()));
    }

    # Clear tmp
    printf("Backoffice clear tmp \n");
    $clear_tmp = \Siberian\Backoffice::cleartmp();
    if($clear_tmp->isSuccess()) {
        printf("Success: %s \n", print_r($clear_tmp->getResponse(), true));
    } else {
        throw new Exception(sprintf("Error: %s \n", $clear_tmp->getErrorMessage()));
    }

    # Clear logs
    printf("Backoffice clear logs \n");
    $clear_logs = \Siberian\Backoffice::clearlogs();
    if($clear_logs->isSuccess()) {
        printf("Success: %s \n", print_r($clear_logs->getResponse(), true));
    } else {
        throw new Exception(sprintf("Error: %s \n", $clear_logs->getErrorMessage()));
    }

    # Rebuild manifest
    printf("Backoffice rebuild manifest \n");
    $rebuild_manifest = \Siberian\Backoffice::manifest();
    if($rebuild_manifest->isSuccess()) {
        printf("Success: %s \n", print_r($rebuild_manifest->getResponse(), true));
    } else {
        throw new Exception(sprintf("Error: %s \n", $rebuild_manifest->getErrorMessage()));
    }
} else {
    printf("Backoffice test is disabled by default to prevent unwanted clears or rebuilds. \n");
}
