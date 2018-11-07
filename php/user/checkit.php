<?php

session_start();

if (!isset($_SESSION['user']))
{
  	$host=$_SERVER["HTTP_HOST"];
   	$path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
   	header("Location: ../../index.php");
   	exit;
 }

require_once('../connections/db_connections.php');

mysql_select_db($database, $connect);

$id = mysql_real_escape_string(trim($_POST['id']));
$contact = mysql_real_escape_string(trim($_POST['string']));
$user = $_SESSION['user_id'];


$updateObject = false;
$updateObject = mysql_query("UPDATE lijekarne SET timestamp = NOW(), 
 											 contacted = '".$contact."', 
 											   checked = 1,
 											   user = ".$user."
 											  WHERE id = ".$id.";");

$getMail = mysql_query("SELECT email FROM lijekarne WHERE id =".$id." LIMIT 1;");

$getMail2 = mysql_fetch_assoc($getMail);

$getBody = mysql_query("SELECT text, title FROM emails WHERE id=1 LIMIT 1");

$getBody2 = mysql_fetch_assoc($getBody);

$getFrom = mysql_query("SELECT email FROM users WHERE id = ".$user.";");

$getFrom2 = mysql_fetch_assoc($getFrom);

$query = mysql_query("SELECT path FROM attach WHERE id = 1 LIMIT 1"); $queryy = mysql_fetch_assoc($query); 

$attach = $queryy['path'];

	$name = (trim($_POST['name']));
	$email = (trim($_POST['email']));
	$phone = (trim($_POST['phone']));
	$address = (trim($_POST['address']));
	$title = (trim($_POST['title'])); 
	$message = (trim($_POST['message']));

	$to = $getMail2['email']; 
    //$to = 'ivucicev@gmail.com';
	$subject = $getBody2['title'];
	$headers = "From: ".$getFrom2['email']."\r\n";	
	$headers .= "Return-Path: ".$getFrom2['email']."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";	
	$html = "".$getBody2['text']."<img src='http://ljekarne.me/php/admin/".$attach."' style='width:100%'>   <a href='http://ljekarne.me/php/admin/".$attach."'>Pogledaj Privitak</a>"; 

	if ($to=='' ||$to ==' ' || $to == NULL) {
		
	} else {

		$send = mail($to, $subject, $html, $headers);

	}



if($updateObject)
{

   echo 1;

}
else
{

   echo 0;

}

