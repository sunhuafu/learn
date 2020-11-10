<?php


echo date("Y-m-d H:i:s");
echo PHP_EOL;
echo date("Y-m-d H:i:s", time() - 3600);
echo PHP_EOL;
echo date("Y-m-d H:i:s", strtotime("-1 day", time()));
echo PHP_EOL;
// 日期转时间戳
echo strtotime("2020-09-27 00:00:00");
// 1601164800
echo PHP_EOL;
echo date("y-m-d H:i:s", 1601164800);