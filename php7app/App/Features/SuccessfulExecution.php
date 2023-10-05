<?php declare(strict_types=1);

namespace App\Features;

class SuccessfulExecution
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getResult()
    {
        return $this->data;
    }
}
