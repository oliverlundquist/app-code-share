<?php

// Named Pipes (FIFO)
// $file  = "/tmp/ipc-named-pipe";
// @unlink($file);
// posix_mkfifo($file, 0600);
// $pipe  = fopen($file, 'w');
// $write = fwrite($pipe, 'Hello from Sender: Named Pipe');
// unlink($file); // delete pipe

// SysV Shared Memory
// $file   = "/tmp/ipc-shared-memory";
// @unlink($file);
// @touch($file);
// $key    = ftok($file, 'T');
// $memory = shm_attach($key, 1024);
// $put    = shm_put_var($memory, 1, 'Hello from Writer: Shared Memory');
// $detach = shm_detach($memory);

$file   = "/tmp/ipc-shared-memory";
@unlink($file);
@touch($file);
$key    = ftok($file, 'T');
$memory = shmop_open($key, 'c', 0644, 1024);
$put    = shmop_write($memory, 'Hello from Writer: Shared Memory', 0);

// SysV Message Queues
// $file   = "/tmp/ipc-message-queues";
// @unlink($file);
// @touch($file);
// $key     = ftok($file, 'T');
// $queue   = msg_get_queue($key, 0666);
// $error   = null;
// $message = 'Hello from Writer: Message Queue'; // If serialize is set to false, then must be either: string, int, float or bool.
// msg_send($queue, 1, $message, true, false, $error);
