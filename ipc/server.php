<?php

// TCP/UDS [Stream]
$file      = '/tmp/ipc-socket.sock';
@unlink($file);
$message   = 'Hello from Server: TCP/UDS [Stream]';
$socket    = socket_create(AF_UNIX, SOCK_STREAM, 0);
$bind      = socket_bind($socket, $file);
$listen    = socket_listen($socket);
$client1   = socket_accept($socket);
$written   = socket_write($client1, $message);
$input     = socket_read($client1, 1024);
$closeChnl = socket_close($client1);
$closeSock = socket_close($socket);
echo $input . PHP_EOL;

// TCP/IP [Stream]
$address   = '127.0.0.1';
$port      = 9999;
$message   = 'Hello from Server: TCP/IP [Stream]';
$socket    = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$bind      = socket_bind($socket, $address, $port);
$listen    = socket_listen($socket);
$client1   = socket_accept($socket);
$written   = socket_write($client1, $message);
$input     = socket_read($client1, 1024);
$closeChnl = socket_close($client1);
$closeSock = socket_close($socket);
echo $input . PHP_EOL;
