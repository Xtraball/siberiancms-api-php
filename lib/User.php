<?php

namespace Siberian;

class User {

    /**
     * @param $email Required
     * @param $password
     * @param $firstname
     * @param $lastname
     * @param int $role_id
     */
    public static function create($email, $password = "", $firstname = "", $lastname = "", $role_id = 1) {
        $endpoint = "admin/api_account/create";

        if(empty($email)) {
            throw new Exception("#100 E-mail is required.");
        }

        # Building data
        $data = array(
            "email" => $email,
            "password" => $password,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "role_id" => $role_id,
        );

        return Request::post($endpoint, $data);
    }

    public static function update() {
        $endpoint = "admin/api_account/update";
    }

    public static function exist() {
        $endpoint = "admin/api_account/exists";
    }

    public static function authenticate() {
        $endpoint = "admin/api_account/authenticate";
    }

    public static function forgotpassword() {
        $endpoint = "admin/api_account/forgotpassword";
    }

}