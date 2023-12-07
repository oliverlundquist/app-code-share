<?php

// UDP/UDS [Datagram]
$file    = '/tmp/ipc-socket.sock';
@unlink($file);
$message = '';
$socket  = socket_create(AF_UNIX, SOCK_DGRAM, 0);
$bind    = socket_bind($socket, $file); // creates the .sock file
$bytes   = socket_recvfrom($socket, $message, 1024, 0, $file);
echo $message . PHP_EOL;

// UDP/IP [Datagram]
$address = '127.0.0.1';
$port    = 9999;
$message = '';
$socket  = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
$bind    = socket_bind($socket, $address, $port);
$bytes   = socket_recvfrom($socket, $message, 1024, 0, $address, $port);
$close   = socket_close($socket); // close connection
echo $message . PHP_EOL;
