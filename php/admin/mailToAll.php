<?php

session_start();

if (!isset($_SESSION['admin']))
{
  	$host=$_SERVER["HTTP_HOST"];
   	$path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
   	header("Location: ../../index.php");
   	exit;
 }

require_once('../connections/db_connections.php');

mysql_select_db($database, $connect);




$getBody = mysql_query("SELECT text, title FROM emails WHERE id=1 LIMIT 1");

$getBody2 = mysql_fetch_assoc($getBody);

$body = $getBody2['text'];

$title = $getBody2['title'];

$from = 'no-replay@eurovita.ch';

$query = mysql_query("SELECT path FROM attach WHERE id = 1 LIMIT 1"); $queryy = mysql_fetch_assoc($query); 

$attach = $queryy['path'];

$getMail = mysql_query("SELECT email FROM lijekarne WHERE checked = 1 LIMIT 1;");

while ($getMail2 = mysql_fetch_assoc($getMail)) {

	$to = $getMail2['email']; 
    //$to = 'ivucicev@gmail.com';
	$subject = $title;
	$headers = "From: ".$from."\r\n";	
	$headers .= "Return-Path: ".$from."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";	
	$html = "".$body."<img src='http://ljekarne.me/php/admin/".$attach."' style='width:100%'><a href='http://ljekarne.me/php/admin/".$attach."'>Pogledaj Privitak</a>"; 

	if ($to=='' || $to ==' ' || $to == NULL) {
		
	} else {

		$send = mail($to, $subject, $html, $headers);

	}

}

echo 1;

