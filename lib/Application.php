<?php

namespace Siberian;

class Application {

    /**
     * @param $name Application name
     * @param $user_id Owner unique identifier
     * @param $key Application key - Must be unique (e.g. http://www.domain.com/my-key)
     * @param $font_family Arial, Helvetica, Verdana, Georgia, Times new roman, Palatino
     * @param $domain (e.g. m.domain.com)
     * @param $is_active Render the application invisible from the editor
     * @param $is_locked Activate or deactivate the application
     * @return Response
     * @throws Exception
     */
    public static function create($name, $user_id, $key = null, $font_family = null, $domain = null, $is_active = true, $is_locked = true) {
        $endpoint = "application/api/create";

        if(empty($name) || empty($user_id)) {
            throw new Exception("#300 Name & User_id are required.");
        }

        # Building data
        $data = array(
            "name" => $name,
            "user_id" => $user_id,
            "is_active" => $is_active,
            "is_locked" => $is_locked,
        );

        if(!is_null($key)) {
            $data["key"] = $key;
        }

        if(!is_null($font_family)) {
            $data["font_family"] = $font_family;
        }

        if(!is_null($domain)) {
            $data["domain"] = $domain;
        }

        return Request::post($endpoint, $data);
    }

    /**
     * @param $app_id Unique identifier
     * @param null $name Application name
     * @param null $key Application key - Must be unique (e.g. http://www.domain.com/my-key)
     * @param null $font_family Arial, Helvetica, Verdana, Georgia, Times new roman, Palatino
     * @param null $domain (e.g. m.domain.com)
     * @param null $is_active Render the application invisible from the editor
     * @param null $is_locked Activate or deactivate the application
     */
    public static function update($app_id, $name = null, $key = null, $font_family = null, $domain = null, $is_active = null, $is_locked = null) {
        $endpoint = "application/api/update";

        if(empty($app_id)) {
            throw new Exception("#301 App_id is required.");
        }

        $data = array(
            "app_id" => $app_id,
        );

        if(!is_null($name)) {
            $data["name"] = $name;
        }

        if(!is_null($key)) {
            $data["key"] = $key;
        }

        if(!is_null($font_family)) {
            $data["font_family"] = $font_family;
        }

        if(!is_null($domain)) {
            $data["domain"] = $domain;
        }

        if(!is_null($is_active)) {
            $data["is_active"] = $is_active;
        }

        if(!is_null($is_locked)) {
            $data["is_locked"] = $is_locked;
        }

        return Request::post($endpoint, $data);
    }

    /**
     * @param $app_id Unique identifier
     * @param $admin_id User identifier
     */
    public static function grant_user($app_id, $admin_id) {
        $endpoint = "application/api_admin/add";

        if(empty($app_id) || empty($admin_id)) {
            throw new Exception("#302 App_id & Admin_id are required.");
        }

        $data = array(
            "app_id" => $app_id,
            "admin_id" => $admin_id,
        );

        return Request::post($endpoint, $data);
    }

    /**
     * @param $app_id Unique identifier
     * @param $admin_id User identifier
     */
    public static function revoke_user($app_id, $admin_id) {
        $endpoint = "application/api_admin/remove";

        if(empty($app_id) || empty($admin_id)) {
            throw new Exception("#302 App_id & Admin_id are required.");
        }

        $data = array(
            "app_id" => $app_id,
            "admin_id" => $admin_id,
        );

        return Request::post($endpoint, $data);
    }

}