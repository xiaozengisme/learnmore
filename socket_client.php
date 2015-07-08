<?php
//error_reporting(E_ALL);
header("Content-type:text/html;charset=utf-8");

echo "<h2>TCP/IP连接</h2>";
$service_port = 10005;
$address = '127.0.0.1';

//创建socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
	echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "<br>";
} else {
	echo "OK. <br>";
}

echo "尝试连接'$address'端口'$service_port'...<br>";

//连接socket
$result = socket_connect($socket, $address, $service_port);
if($result === false) {
	echo "socket_connect() failed.<br>Reason: ($result) " . socket_strerror(socket_last_error($socket)) . "<br>";
} else {
	echo "OK <br>";
}

/*$in = "HEAD / http/1.1\n";
$in .= "HOST: localhost\n";
$in .= "Connection: close\n";*/
$in = 'Hello World!!';
echo "发送HTTP头请求 ...<br>";

//将内容写入socket
socket_write($socket, $in, strlen($in));
echo  "OK<br>";

echo "读取响应:<br>";
$out = "";
//读取socket
while ($out = socket_read($socket, 8192)) {
	echo $out;
}

echo "关闭socket..<br>";

//关闭socket
socket_close($socket);
echo "OK .<br>";