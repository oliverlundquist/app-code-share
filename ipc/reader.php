<?php

// Named Pipes (FIFO)
// $file  = "/tmp/ipc-named-pipe";
// $pipe  = fopen($file, 'r');
// $input = fread($pipe, 1024);
// echo $input . PHP_EOL;

// SysV Shared Memory
// $file   = "/tmp/ipc-shared-memory";
// $key    = ftok($file, 'T');
// $memory = shm_attach($key, 1024);
// $input  = shm_get_var($memory, 1);
// $remove = shm_remove($memory);
// $detach = shm_detach($memory);
// @unlink($file);
// echo $input . PHP_EOL;

$file   = "/tmp/ipc-shared-memory";
$key    = ftok($file, 'T');
$memory = shmop_open($key, 'c', 0644, 1024);
$size   = shmop_size($memory);
$input  = shmop_read($memory, 0, $size);
shmop_delete($memory);
echo $input . PHP_EOL;

// SysV Message Queues
// $file   = "/tmp/ipc-message-queues";
// $key     = ftok($file, 'T');
// $queue   = msg_get_queue($key, 0666);
// $msgType = null;
// $input   = '';
// $error   = null;
// msg_receive($queue, 0, $msgType, 1024, $input, true, 0, $error);
// msg_remove_queue($queue);
// echo $input . PHP_EOL;
