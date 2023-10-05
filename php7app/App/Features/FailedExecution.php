<?php declare(strict_types=1);

namespace App\Features;

class FailedExecution
{
    protected $message;
    protected $exception;

    public function __construct($message, $exception)
    {
        $this->message = $message;
        $this->exception = $exception;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getException()
    {
        return $this->exception;
    }
}
