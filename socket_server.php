<?php
error_reporting(E_ALL);
set_time_limit(0);
//ob_implicit_flush();

$address = '127.0.0.1';
$port = 10005;
//创建端口
if( ($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
	echo "socket_create() failed :reason:" . socket_strerror(socket_last_error()) . "\n";
}

//绑定
if (socket_bind($sock, $address, $port) === false) {
	echo "socket_bind() failed :reason:" . socket_strerror(socket_last_error($sock)) . "\n";
}

//监听
if (socket_listen($sock, 5) === false) {
	echo "socket_listen() failed :reason:" . socket_strerror(socket_last_error($sock)) . "\n";
}

//一直开着
do {
	//得到一个链接
	if (($msgsock = socket_accept($sock)) === false) {
		echo "socket_accept() failed :reason:".socket_strerror(socket_last_error($sock)) . "\n";
		break;
	}

	//welcome  发送到客户端
	$msg = "<font color='red'>server send:welcome</font><br/>";
	socket_write($msgsock, $msg, strlen($msg));

	//在命令行上输出
	echo 'read client message'."\n";

	//读取socket的数据
	$buf = socket_read($msgsock, 8192);

	$talkback = "server received message:$buf\n";

	//在命令行上输出
	echo $talkback;

	$talkback .= '<br>';

	//发送到客户端，成功或者失败
	if (false === socket_write($msgsock, $talkback, strlen($talkback))) {
		echo "socket_write() failed reason:" . socket_strerror(socket_last_error($sock)) ."\n";
	} else {
		echo 'send success'."\n";
	}

	//关闭得到的链接
	socket_close($msgsock);

} while(true);

//关闭socket
socket_close($sock);