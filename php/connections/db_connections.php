<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"


$hostname = "localhost";
$database = "lijekarne";
$username = "root";
$password = "";


$connect = mysqli_connect($hostname, $username, $password, $database) or trigger_error(mysql_error(),E_USER_ERROR); 
mysqli_query($connect, "SET NAMES 'utf8'"); 
?>