<?php
use Workerman\Worker;
use Workerman\Connection\TcpConnection;
use Workerman\Protocols\Http\Request;
require_once __DIR__ . '/vendor/autoload.php';

// 创建一个Worker监听2345端口，使用http协议通讯
$http_worker = new Worker("udp://0.0.0.0:53");

// 启动4个进程对外提供服务
$http_worker->count = 4;

// 接收到浏览器发送的数据时回复hello world给浏览器
$http_worker->onMessage = function(TcpConnection $connection, Request $request)
{
    var_dump($request);
    // 向浏览器发送hello world
    $connection->send('hello world');
};

// 运行worker
Worker::runAll();