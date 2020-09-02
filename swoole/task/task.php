<?php

$serv = new Swoole\Server("127.0.0.1", 9501);

//设置异步任务的工作进程数量
$serv->set(array('task_worker_num' => 4));

//此回调函数在worker进程中执行
$serv->on('receive', function($serv, $fd, $from_id, $data) {
    //投递异步任务
    echo "收到客户端数据: id=$fd data=$data\n";
//    $task_id = $serv->task($data); // 异步投递
//    $result = $serv->taskwait($data, 5, -1);
    $busData = [
        "aaa",
        "bbb",
        "ccc",
        "ddd"
    ];
    $result = $serv->taskWaitMulti($busData, 20);
//    echo "数据处理完毕: task_id=$result data={$data}\n";

    var_dump($result);
    if (isset($result[0])) {
        echo "任务1的执行结果为{$result[0]}\n";
    }
    if (isset($result[1])) {
        echo "任务2的执行结果为{$result[1]}\n";
    }
    if (isset($result[2])) {
        echo "任务3的执行结果为{$result[2]}\n";
    }
    if (isset($result[3])) {
        echo "任务4的执行结果为{$result[3]}\n";
    }

});

//处理异步任务(此回调函数在task进程中执行)
$serv->on('task', function ($serv, $task_id, $from_id, $data) {
    echo "this task data: $data \n";
    $sleepSecond = ($task_id + 1) * 5;
//    $sleepSecond = 5;
    sleep($sleepSecond);
    echo "do ing data:[id=$task_id]".PHP_EOL;
    //返回任务执行的结果
    $serv->finish("$data -> OK");
});

//处理异步任务的结果(此回调函数在worker进程中执行)
$serv->on('finish', function ($serv, $task_id, $data) {
//    echo "AsyncTask[$task_id] Finish: $data".PHP_EOL;
    echo "finish!";
});

$serv->start();
