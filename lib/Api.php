<?php

namespace Siberian;

/**
 * Class Api
 * @package Siberian
 */
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

    /**
     * @var
     */
    public static $bearerToken;

    /**
     * @var string
     */
    public static $authType = 'basic';

    /**
     * @var string
     */
    public static $version = '4.13.8';

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
        $urlParts = parse_url($host);
        $host = $urlParts["scheme"] . "://" . $urlParts["host"] . "/";

        self::$host = $host;
        self::$username = $username;
        self::$password = $password;
    }

    /**
     * @param $host
     * @param $bearerToken
     * @throws \Exception
     */
    public static function initWithBearer($host, $bearerToken) {
        // Is a valid endpoint!
        if (filter_var($host, FILTER_VALIDATE_URL) === false) {
            throw new \Exception("#001 Invalid host");
        }

        // Credentials!
        if(empty($bearerToken)) {
            throw new \Exception("002 Missing credentials");
        }

        // Formatting to $scheme://$host/
        $urlParts = parse_url($host);
        $host = $urlParts["scheme"] . "://" . $urlParts["host"] . "/";

        self::$host = $host;
        self::$bearerToken = $bearerToken;
        self::$authType = 'bearer';
    }
}