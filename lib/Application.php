<?php

namespace Siberian;

class Application {

    public static function create() {
        $endpoint = "application/api/create";
    }

    public static function update() {
        $endpoint = "application/api/update";
    }

    public static function grant_user() {
        $endpoint = "application/api_admin/add";
    }

    public static function revoke_user() {
        $endpoint = "application/api_admin/remove";
    }

}