<?php

// TCP/UDS [Stream]
$file    = '/tmp/ipc-socket.sock';
$message = 'Hello from Client: TCP/UDS [Stream]';
$socket  = socket_create(AF_UNIX, SOCK_STREAM, 0);
$connect = socket_connect($socket, $file);
$written = socket_write($socket, $message);
$input   = socket_read($socket, 1024);
$close   = socket_close($socket);
echo $input . PHP_EOL;

// TCP/IP [Stream]
$address = '127.0.0.1';
$port    = 9999;
$message = 'Hello from Client: TCP/IP [Stream]';
$socket  = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$connect = socket_connect($socket, $address, $port);
$written = socket_write($socket, $message);
$input   = socket_read($socket, 1024);
$close   = socket_close($socket);
echo $input . PHP_EOL;
