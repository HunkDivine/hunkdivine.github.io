<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'test');
define('DB_PASS', 'test123');
define('DB_NAME', 'news');

$limit = 10; #item per page
# db connect
error_reporting(E_ALL ^ E_DEPRECATED);


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to MySQL DB ') . //mysql_error();
//$db = mysql_select_db(DB_NAME, $link);
?>