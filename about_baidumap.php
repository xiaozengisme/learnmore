<?php
date_default_timezone_set("PRC");
$dest_lat = 29.615467;
$dest_lng = 106.581515;

$org_lat = 29.490294;
$org_lng = 106.486654;


$distance=6371012 * acos(cos(acos(-1) / 180 * $dest_lat) * 
	cos(acos(-1) / 180 * $org_lat) * 
	cos(acos(-1) / 180 * $dest_lng - acos(-1) / 180 * $org_lng) + 
	sin(acos(-1) / 180 * $dest_lat) * 
	sin(acos(-1) / 180 * $org_lat))*1;

echo floor($distance);