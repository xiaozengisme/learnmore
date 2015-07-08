<?php
/*header('Content-type: text/html; charset=utf-8');
$date=date('Y-m-d');  //当前日期
$first=1; //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期
$w=date('w',strtotime($date));  //获取当前周的第几天 周日是 0 周一到周六是 1 - 6 
$now_start=date('Y-m-d H:i:s',strtotime($date.'-'.($w ? $w - $first : 6).' days')); //获取本周开始日期，如果$w是0，则表示周日，减去 6 天
$now_end=date('Y-m-d H:i:s',strtotime("$now_start +6 days") + 24*60*60 - 1);  //本周结束日期
$last_start=date('Y-m-d H:i:s',strtotime("$now_start - 7 days"));  //上周开始日期
$last_end=date('Y-m-d H:i:s',strtotime("$now_start - 1 days"));  //上周结束日期
echo '本周开始日期：',$now_start,'<br />';
echo '本周结束日期：',$now_end,'<br />';
echo '上周开始日期：',$last_start,'<br />';
echo '上周结束日期：',$last_end,'<br />';*/

//正则匹配
/*$subject = "456分";
$pattern = '/^[0-9]/';
preg_match($pattern, $subject, $matches);
var_dump($matches);
*/

//解析url
// var_dump(parse_url('http://www.baidu.com/index.php'));