<?php

session_start();

if (isset($_SESSION['user']))
{   

}
else if (isset($_SESSION['admin']))
{   

    $host=$_SERVER["HTTP_HOST"];
    $path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: ../user/index.php");
    exit;
}
else
{
	$host=$_SERVER["HTTP_HOST"];
    $path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: ../../index.php");
    exit;
}

require_once('../connections/db_connections.php');

mysql_select_db($database, $connect);

$id = mysql_real_escape_string(trim($_POST['id']));

$getObjectsData = mysql_query("SELECT * FROM lijekarne WHERE id = ".$id." LIMIT 1;");

$getObjectsData2 = mysql_fetch_assoc($getObjectsData);

?>

    <form role="form">
        <div class="form-group">

<table class="table table-hover table-striped">
<tbody>
	<tr>
		<td><b>Naziv Ljekarne:</b> </td>
		<td><?php 	echo $getObjectsData2['naziv']; ?> </td>
	</tr>
	<tr>
		<td><b>Grad:</b></td>
		<td><?php 	echo $getObjectsData2['grad']; ?> </td>
	</tr>
	<tr>
		<td><b>Adresa:</b></td>
		<td><?php 	echo $getObjectsData2['adresa']; ?> </td>
	</tr>
	<tr>
		<td> <b>Država: </b></td>
		<td><?php 	echo $getObjectsData2['drzava']; ?> </td>
	</tr>
	<tr>
		<td><b>Županija:</b</td>
		<td><?php 	echo $getObjectsData2['zupanija']; ?> </td>
	</tr>
	<tr>
		<td><b>Telefon:</b> </td>
		<td><?php 	echo $getObjectsData2['telefon']; ?> </td>
	</tr>
	<tr>
		<td> <b>Email: </b></td>
		<td><?php 	echo $getObjectsData2['email']; ?> </td>
	</tr>
	<tr>
		<td> <b>Napomena: </b></td>
		<td><?php 	echo $getObjectsData2['contacted']; ?> </td>
	</tr>
</tbody>
</table>

        </div>
    </form>