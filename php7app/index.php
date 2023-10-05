<?php declare(strict_types=1);

use App\Proxy;

require __DIR__ . '/bootstrap.php';

/* ************************************************************************************* *
 * The code below illustrates an example of how code could be executed in another app.   *
 * In this case, both apps have a completely different composer package and PHP version. *
 * ************************************************************************************* */

// example of nested calls between apps
// 1. this code is executed in the php7 app
// 2. get 'ping' from php8
// 3. php8 app gets 'pong' from php7 app (current app)
$command = <<<'COMMAND'
    use App\Features\POC\Ping;
    echo (new Ping)->execute();
COMMAND;
echo (new Proxy)->toPhp8App($command);
