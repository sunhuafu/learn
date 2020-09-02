<?php


$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

//$redis->set("a", 64);
//$a = $redis->get("a");
//var_dump($a);


//$left = 1;
$key = "seckill";
$value = session_create_id();
$res = $redis->set($key, $value, ['NX', 'EX' => 5]);
//$res = $redis->set($key, $value);
var_dump($res);