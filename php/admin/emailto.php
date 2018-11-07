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

$zanemari = mysql_real_escape_string(trim($_POST['checked'])); //zanemari
$grad = strtoupper(mysql_real_escape_string(trim($_POST['grad'])));
$zupanija = strtoupper(mysql_real_escape_string(trim($_POST['zupanija'])));
$pozvani = mysql_real_escape_string(trim($_POST['svi'])); //pozvani
$sql = "";


//if($checked == "0" && $grad == "" && $zupanija == "" && $svi == "0") #0000
//{
//    $sql = "SELECT email FROM lijekarne WHERE checked = 0;";
//}elseif ($checked == "0" && $grad == "" && $zupanija == "" && $svi == "1") #0001
//{
//    $sql = "SELECT email FROM lijekarne WHERE checked = 1;";
//}elseif ($checked == "0" && $grad == "" && $zupanija != "" && $svi == "0") #0010
//{
//    $sql = "SELECT email FROM lijekarne WHERE checked = 0 AND zupanija = '%$zupanija%';";
//}elseif ($checked == "0" && $grad == "" && $zupanija != "" && $svi == "1") #0011
//{
//    $sql = "SELECT email FROM lijekarne WHERE checked = 1 AND zupanija = '%$zupanija%';";
//}elseif ($checked == "0" && $grad != "" && $zupanija == "" && $svi == "0") #0100
//{
//    $sql = "SELECT email FROM lijekarne WHERE checked = 0 AND grad = '%$grad%';";
//}elseif ($checked == "0" && $grad != "" && $zupanija == "" && $svi == "1") #0101
//{
//    $sql = "SELECT email FROM lijekarne WHERE checked = 1 AND grad = '%$grad%';";
//}elseif ($checked == "0" && $grad != "" && $zupanija != "" && $svi == "0") #0110
//{
//    $sql = "SELECT email FROM lijekarne WHERE checked = 0 AND grad = '%$grad%' AND zupanija = '%$zupanija%';";
//}elseif ($checked == "0" && $grad != "" && $zupanija != "" && $svi == "1") #0111
//{
//    $sql = "SELECT email FROM lijekarne WHERE checked = 1 AND grad = '%$grad%' AND zupanija = '%$zupanija%';";
//} elseif ($checked != "0" && $grad == "" && $zupanija == "" && $svi == "0") #1000
//{
//    $sql = "SELECT email FROM lijekarne;";
//}else
//{
//    $sql = "SELECT email FROM lijekarne WHERE checked = 1;";
//}

if($pozvani == 0)
{
    if($zanemari == 1)
    {
        //echo "zanemari == 1";
        $sql = "SELECT email FROM lijekarne;";
    }
    elseif($zupanija == "" && $grad == "")
    {
        //echo
        $sql = "SELECT email FROM lijekarne WHERE checked = 0;";
    }
    else 'zupanija == "" && grad == ""';
    {
        if($zupanija != "" && $grad == "")
        {
            $sql = "SELECT email FROM lijekarne WHERE zupanija = '{$zupanija}' AND checked = 0;";
        }
        elseif($zupanija != "" && $grad != "")
        {
            $sql = "SELECT email FROM lijekarne WHERE (grad = '{$grad}') AND (zupanija = '{$zupanija}') AND checked = 0;";
        }
        elseif($zupanija == "" && $grad != "")
        {
            $sql = "SELECT email FROM lijekarne WHERE grad = '{$grad}' AND checked = 0;";
        }
    }
}
else
{
    if($zanemari == 1)
    {
        //echo "zanemari == 1 pozvani == 0";
        $sql = "SELECT email FROM lijekarne;";
    }
    elseif($zupanija == "" && $grad == "")
    {
        $sql = "SELECT email FROM lijekarne WHERE checked = 1;";
    }
    else
    {
        if($zupanija != "" && $grad == "")
        {
            $sql = "SELECT email FROM lijekarne WHERE zupanija LIKE '%$zupanija%' AND checked = 1;";
        }
        elseif($zupanija != "" && $grad != "")
        {
            $sql = "SELECT email FROM lijekarne WHERE grad LIKE '%$grad%' AND zupanija LIKE '%$zupanija%' AND checked = 1;";
        }
        elseif($zupanija == "" && $grad != "")
        {
            $sql = "SELECT email FROM lijekarne WHERE grad LIKE '%$grad%' AND checked = 1;";
        }
    }
}
//echo ($pozvani . $zupanija . $grad . $zanemari);

$getMail = mysql_query($sql);
$br=0;
while ($getMail2 = mysql_fetch_assoc($getMail)) {

	$to = $getMail2['email']; 
    //$to = 'akozar@etfos.hr';
	$subject = $title;
	$headers = "From: ".$from."\r\n";	
	$headers .= "Return-Path: ".$from."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";	
	$html = "".$body."<img src='http://ljekarne.me/php/admin/".$attach."' style='width:100%'><a href='http://ljekarne.me/php/admin/".$attach."'>Pogledaj Privitak</a>"; 

	if ($to=='' || $to ==' ' || $to == NULL) {
		
	} else {

        $send = mail($to, $subject, $html, $headers);
        $br++;
        ?>
        <p>Email poslan prema: <?php echo $br . " - " . $to ?></p>
<?php
         

	}

}


