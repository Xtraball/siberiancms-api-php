<?php

namespace Siberian;

/**
 * Class User
 * @package Siberian
 */
class User
{
    /**
     * @param string $email
     * @param string $password
     * @param string $firstname
     * @param string $lastname
     * @param int $role_id
     * @return Response
     * @throws \Exception
     */
    public static function create($email, $password = "", $firstname = "", $lastname = "", $role_id = 1)
    {
        $endpoint = "admin/api_account/create";

        if (empty($email)) {
            throw new \Exception("#00 E-mail is required.");
        }

        # Building data
        $data = [
            "email" => $email,
            "password" => $password,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "role_id" => $role_id,
        ];

        return Request::post($endpoint, $data);
    }

    /**
     * @param $user_id
     * @param null $email
     * @param null $password
     * @param null $firstname
     * @param null $lastname
     * @param null $role_id
     * @return Response
     * @throws \Exception
     */
    public static function update($user_id, $email = null, $password = null, $firstname = null, $lastname = null, $role_id = null)
    {
        $endpoint = "admin/api_account/update";

        if (empty($user_id)) {
            throw new \Exception("#101 User_id is required.");
        }

        $data = [
            "user_id" => $user_id,
        ];

        if (!is_null($email)) {
            $data["email"] = $email;
        }

        if (!is_null($password)) {
            $data["password"] = $password;
        }

        if (!is_null($firstname)) {
            $data["firstname"] = $firstname;
        }

        if (!is_null($lastname)) {
            $data["lastname"] = $lastname;
        }

        if (!is_null($role_id)) {
            $data["role_id"] = $role_id;
        }

        return Request::post($endpoint, $data);
    }

    /**
     * @param $email
     * @return Response
     * @throws \Exception
     */
    public static function exist($email)
    {
        $endpoint = "admin/api_account/exist";

        if (empty($email)) {
            throw new \Exception("#102 E-mail is required.");
        }

        $data = [
            "email" => $email,
        ];

        return Request::post($endpoint, $data);
    }

    /**
     * @param $email
     * @param $password
     * @return Response
     * @throws \Exception
     */
    public static function authenticate($email, $password)
    {
        $endpoint = "admin/api_account/authenticate";

        if (empty($email) || empty($password)) {
            throw new \Exception("#103 E-mail & Password are required.");
        }

        $data = [
            "email" => $email,
            "password" => $password,
        ];

        return Request::post($endpoint, $data);
    }

    /**
     * @param $email
     * @return Response
     * @throws \Exception
     */
    public static function forgotpassword($email)
    {
        $endpoint = "admin/api_account/forgotpassword";

        if (empty($email)) {
            throw new \Exception("#104 E-mail is required.");
        }

        $data = [
            "email" => $email,
        ];

        return Request::post($endpoint, $data);
    }

}