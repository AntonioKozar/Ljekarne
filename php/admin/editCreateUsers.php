<?php 

session_start();

if (isset($_SESSION['admin']))
{   

}
else if (isset($_SESSION['user']))
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/datepicker.css" rel="stylesheet">
     <link href="../../less/datepicker.less" rel="stylesheet">
</head>
	<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<a class="navbar-brand" href="#"><?php echo $_SESSION['admin']; ?></a>
	<ul class="nav navbar-nav">
		<li>
			<a href="index.php"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;Pregled korisnika</a>
		</li>
		<li>
			<a href="object.php"><i class="glyphicon glyphicon-fire"></i>&nbsp;Pregled ljekarni</a>
		</li>
		<li>
			<a href="editCreateObjects.php"><i class="glyphicon glyphicon-bookmark"></i>&nbsp;Uredi/dodaj ljekarnu</a>
		</li>
		<li class="active">
			<a href="editCreateUsers.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Uredi/dodaj korisnika</a>
		</li>
		<li>
			<a href="emails.php"><i class="glyphicon glyphicon-envelope"></i>&nbsp;Email</a>
		</li>
		<li>
			<a href="logout.php"><i class="glyphicon glyphicon-off"></i>&nbsp;Odjava</a>
		</li>
	</ul>
</nav><br><br><br><br>
	<div class="container">
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<input type="search" name="search" id="inputSearch" class="form-control" onkeyup="getUsers(this.value)" value="" placeholder="Pretraga..." title="">
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
<a href="newUser.php" type="button" class="btn btn-primary">Dodaj novog korisnika <i class="glyphicon glyphicon-plus-sign"></i></a>
</div>
	</div><br>
		<div class="row">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Uredi</th>
					<th>Ime</th>
					<th>Prezime</th>
					<th>Email</th>
					<th>Kontakt</th>
					<th>Broj pozvanih ljekarni</th>
					<th>Posljednji poziv obavljen</th>
					<th>Ukloni</th>
				</tr>
			</thead>
			<tbody id="table_rows">

			</tbody>
		</table>
	</div>
		
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

	<script>

function removeUser(id)
	{

    var yesno = confirm("Jeste li sugurni da &Zcaron;elite ukloniti korisnika?");

		if (yesno) {

		$.ajax({
			url: 'removeUser.php',
			type: 'POST',
			data: {id: id},
		})
		.done(function(data) {
			var data = parseInt(data);
			if (data == 1) {
				getUsers();
				alert("Korisnik je uklonjen!");

			}
			else {
				alert("Došlo je do greške!");
			}
			console.log("success");
		})
		.fail(function() {
			alert("Došlo je do pogreške!");
		})
		.always(function() {
			
		});
		
	} else {


	}
}



function editUser(id){

	location.href = 'editUser.php?id='+id;

}

function getUsers(arg) 
{

	arg = $("#inputSearch").val();

	$.ajax({
		url: 'getUsersEdit.php',
		type: 'POST',
		data: { string: arg},
	})
	.done(function(data) {
		$("#table_rows").html(data);
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}	

$(document).ready(function() {
	getUsers();
});

	</script>
</body>
</html>
