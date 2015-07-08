<?php
$file = fopen('common.js', 'r');
$rule = '/J[_a-zA-Z0-9]*/';
$arr  = array();

while(!feof($file)){
	$line = fgets($file);

	preg_match_all($rule,$line,$result);

	$r = $result[0];

	if(!empty($r)){
		$c = count($r);
		for($i = 0; $i < $c; $i ++){
			if(!in_array($r[$i], $arr)){
				array_push($arr, $r[$i]);
			}
		}
	}
}

$content = join($arr, ', ');
file_put_contents('yes.txt', join($arr, ', '));

fclose($file);