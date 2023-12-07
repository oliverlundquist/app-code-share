<?php

// UDP/UDS [Datagram]
$file    = '/tmp/ipc-socket.sock';
$message = 'Hello from Sender: UDP/UDS [Datagram]';
$socket  = socket_create(AF_UNIX, SOCK_DGRAM, 0);
$written = socket_sendto($socket, $message, mb_strlen($message), 0, $file);
sleep(1); // wait for UDP/IP listener

// UDP/IP [Datagram]
$address = '127.0.0.1';
$port    = 9999;
$message = 'Hello from Sender: UDP/IP [Datagram]';
$socket  = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
$written = socket_sendto($socket, $message, mb_strlen($message), 0, $address, $port);
socket_close($socket); // close connection
