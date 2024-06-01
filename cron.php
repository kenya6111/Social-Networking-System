<?php
// time.txtに現在時刻を追記する

$file = '/home/kenya/recursion/ServersWithDatabases/time.txt';
$file = __DIR__.'/time.txt';
$current = file_get_contents($file);

date_default_timezone_set('Asia/Tokyo');
$current .= date("Y-m-d H:i:s")."\n";

file_put_contents($file, $current);

