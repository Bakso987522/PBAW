<?php

namespace core;
class Messages
{
    private $errors = array();
    private $infos = array();
    private $numErrors = 0;
    private $numInfos = 0;

    public function addError($message)
    {
        $this->errors[] = $message;
        $this->numErrors++;
    }

    public function addInfo($message)
    {
        $this->infos[] = $message;
        $this->numInfos++;
    }

    public function isEmpty()
    {
        return $this->numErrors == 0 && $this->numInfos == 0;
    }

    public function isError()
    {
        return $this->numErrors > 0;
    }

    public function isInfo()
    {
        return $this->numInfos > 0;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getInfos()
    {
        return $this->infos;
    }

    public function clear()
    {
        $this->errors = array();
        $this->infos = array();
        $this->numErrors = 0;
        $this->numInfos = 0;
    }
}