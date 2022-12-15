<?php
use Workerman\Worker;
use Workerman\Connection\TcpConnection;
use Workerman\Protocols\Http\Request;
require_once __DIR__ . '/vendor/autoload.php';
$worker = new Worker('Dns://0.0.0.0:53');
// 注意直接udp协议是有效的，使用自定义协议无效
$worker->transport = 'udp';  
$worker->onMessage = function($connection, $data){
echo $data;
echo $connection->getRemoteIp();
};
Worker::runAll();