<?php

namespace Siberian;

class Backoffice {

    /**
     * @return Response
     * @throws Exception
     */
    public static function manifest() {
        $endpoint = "backoffice/api_options/manifest";

        return Request::post($endpoint, []);
    }

    /**
     * @return Response
     * @throws Exception
     */
    public static function clearcache() {
        $endpoint = "backoffice/api_options/clearcache";

        return Request::post($endpoint, []);
    }

    /**
     * @return Response
     * @throws Exception
     */
    public static function cleartmp() {
        $endpoint = "backoffice/api_options/cleartmp";

        return Request::post($endpoint, []);
    }

    /**
     * @return Response
     * @throws Exception
     */
    public static function clearlogs() {
        $endpoint = "backoffice/api_options/clearlogs";

        return Request::post($endpoint, []);
    }

}