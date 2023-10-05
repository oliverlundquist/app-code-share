<?php declare(strict_types=1);

namespace App\Features\POC;

use App\Proxy;

class Ping
{
    public function execute()
    {
        // get 'pong' from php7 app
        $command = <<<'COMMAND'
            use App\Features\POC\Pong;
            echo (new Pong)->execute();
        COMMAND;
        $ping = 'ping';
        $pong = (new Proxy)->toPhp7App($command);

        // return 'ping pong'
        return $ping . ' ' . $pong;
    }
}
