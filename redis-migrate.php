#!/usr/bin/env php
<?php

list(, $host1, $port1, $host2, $port2) = $argv;

$redis = new Redis();
$redis->connect($host1, $port1);
$keys = $redis->keys("*");

foreach ($keys as $key) {
    $redis->migrate($host2, $port2, $key, 0, 3600, true, false);
}
