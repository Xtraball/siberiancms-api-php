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
     * @var Integer
     */
    public $status;

    public function __construct($response) {
        $this->status = $response;
    }

    /**
     * @return bool
     */
    public function isSuccess() {
        return ($this->status == self::STATUS_SUCCESS);
    }

    public function getResponse() {

    }
}