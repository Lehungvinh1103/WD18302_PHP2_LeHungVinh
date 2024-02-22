<?php

namespace App\core\exception;

use Exception;

class NotFoundException extends Exception{

    protected $code = 404;
    protected $message = 'Page not found';

    public function __toString()
    {
        return $this->code . '-' . $this->message;
    }

}