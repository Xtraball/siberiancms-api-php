<?php

namespace Siberian;

/**
 * Class Response
 * @package Siberian
 */
class Response
{
    /**
     * @var Integer success
     */
    const STATUS_SUCCESS = 1;

    /**
     * @var Integer error
     */
    const STATUS_ERROR = 2;

    /**
     * @var array
     */
    public $http_codes = [
        100,
        200,
        400,
    ];

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
    public $response = [];

    /**
     * @var null|string
     */
    public $error_message = null;

    /**
     * Response constructor.
     * @param $status_code
     * @param $response
     * @throws \Exception
     */
    public function __construct($status_code, $response)
    {
        if (!in_array($status_code, $this->http_codes)) {
            throw new \Exception("#200 An error occured with the request, {$status_code}.");
        }

        $this->raw_response = $response;

        $result = json_decode($this->raw_response, true);
        if ($result === null) {
            throw new \Exception("#201 An error occurred while decoding result.");
        } else {
            $this->response = $result;
        }

        if (array_key_exists("success", $result)) {
            $this->status = self::STATUS_SUCCESS;
        } elseif (array_key_exists("error", $result)) {
            $this->status = self::STATUS_ERROR;
            $this->error_message = (array_key_exists("message", $result)) ?
                $result["message"] : "#203 Undefined error.";
        }
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return ($this->status == self::STATUS_SUCCESS);
    }

    /**
     * @param null $key
     * @return array|mixed
     */
    public function getResponse($key = null)
    {
        $value = $this->response;
        if (array_key_exists($key, $this->response)) {
            $value = $this->response[$key];
        }

        return $value;
    }

    /**
     * @return String
     */
    public function getRawResponse()
    {
        return $this->raw_response;
    }

    /**
     * @return null|string
     */
    public function getErrorMessage()
    {
        return $this->error_message;
    }
}