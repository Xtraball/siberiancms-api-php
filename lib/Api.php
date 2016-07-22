<?php

namespace Siberian;

class Api {

    /**
     * @var String Siberian host
     */
    public static $host;

    /**
     * @var String API username
     */
    public static $username;

    /**
     * @var String API password
     */
    public static $password;

    public static $version = 4.2;

    /**
     * @param $host
     * @param $username
     * @param $password
     * @throws \Exception
     */
    public static function init($host, $username, $password) {
        # Is a valid endpoint ?
        if(filter_var($host, FILTER_VALIDATE_URL) === false) {
            throw new \Exception("#001 Invalid host");
        }

        # Credentials
        if(empty($username) || empty($password)) {
            throw new \Exception("002 Missing credentials");
        }

        # Formatting to $scheme://$host/
        $url_parts = parse_url($host);
        $host = $url_parts["scheme"]."://".$url_parts["host"]."/";

        self::$host = $host;
        self::$username = $username;
        self::$password = $password;
    }
}