<?php

namespace Siberian;

class Response {

    /**
     * @var Integer success
     */
    const STATUS_SUCCESS = 1;

    /**
     * @var Integer error
     */
    const STATUS_ERROR = 2;

    /**
     * @var Array
     */
    public $http_codes = array(
        200,
        400,
    );

    /**
     * @var Integer
     */
    public $status;

    /**
     * @var String json string response
     */
    public $raw_response;

    /**
     * @var array json decoded to array
     */
    public $response = array();

    /**
     * @var null|string
     */
    public $error_message = null;

    /**
     * Response constructor.
     * @param $status_code
     * @param $response
     */
    public function __construct($status_code, $response) {
        if(!in_array($status_code, $this->http_codes)) {
            throw new \Exception("#200 An error occured with the request.");
        }

        $this->raw_response = $response;

        $result = json_decode( $this->raw_response, true);
        if($result === null) {
            throw new \Exception("#201 An error occurred while decoding result.");
        } else {
            $this->response = $result;
        }

        if(array_key_exists("success", $result)) {
            $this->status = self::STATUS_SUCCESS;
        } elseif(array_key_exists("error", $result)) {
            $this->status = self::STATUS_ERROR;
            $this->error_message = (array_key_exists("message", $result)) ? $result["message"] : "#203 Undefined error.";
        }
    }

    /**
     * @return bool
     */
    public function isSuccess() {
        return ($this->status == self::STATUS_SUCCESS);
    }

    /**
     * @return array
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * @return String
     */
    public function getRawResponse() {
        return $this->raw_response;
    }

    /**
     * @return null|string
     */
    public function getErrorMessage() {
        return $this->error_message;
    }
}