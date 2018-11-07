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

require_once('../connections/db_connections.php');

mysql_select_db($database, $connect);

$id = mysql_real_escape_string(trim($_GET['id']));

$getObjectsData = mysql_query("SELECT * FROM lijekarne WHERE id = ".$id." LIMIT 1;");

$getObjectsData2 = mysql_fetch_assoc($getObjectsData);

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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.min.css">
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
		<li  class="active">
			<a href="editCreateObjects.php"><i class="glyphicon glyphicon-bookmark"></i>&nbsp;Uredi/dodaj ljekarnu</a>
		</li>
		<li>
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
<form id="form">
	<div class="container">



	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<input type="hidden" name="id" id="inputId" class="form-control" value=" <?php echo $getObjectsData2['id']; ?> "><br>
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputName" class="col-sm-2">Ime: </label>
<input type="text" name="name" id="inputName" class="form-control" value="<?php echo $getObjectsData2['naziv']; ?>" required="required" pattern="" title=""><br>

			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputCity" class="col-sm-2">Grad: </label>
			<input type="text" name="city" id="inputCity" class="form-control" value="<?php echo $getObjectsData2['grad']; ?>" required="required" pattern="" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputAddress" class="col-sm-2">Adresa: </label>
			<input type="text" name="address" id="inputAddress" class="form-control" value="<?php echo $getObjectsData2['adresa']; ?>" required="required" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputCountry" class="col-sm-2">Dr&zcaron;ava: </label>
			<input type="text" name="country" id="inputCountry" class="form-control" value="<?php echo $getObjectsData2['drzava']; ?>" required="required" pattern="" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputCounty" class="col-sm-2">&Zcaron;upanija: </label>

		<input type="text" name="county" id="inputCounty" class="form-control" value="<?php echo $getObjectsData2['zupanija'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputPhone" class="col-sm-2">Telefon: </label>

		<input type="tel" name="phone" id="inputPhone" class="form-control" value="<?php echo $getObjectsData2['telefon'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>		
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputEmail" class="col-sm-2">Email: </label>

		<input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo $getObjectsData2['email'] ?>" required="required" title="">
		</div><br>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputTimestamp" class="col-sm-2">Datum: </label>

		<input type="text" name="timestamp" id="inputTimestamp" class="form-control" value="<?php echo $getObjectsData2['timestamp'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputContacted" class="col-sm-2">Napomena: </label>

		<input type="text" name="contacted" id="inputContacted" class="form-control" value="<?php echo $getObjectsData2['contacted'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
			<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputChecked" class="col-sm-2">Pozvani: </label>

		<select name="checked" id="inputChecked" class="form-control" required="required">

		<?php

			if ($getObjectsData2['checked']==1) {

				?>
				
				<option value="1" selected="selected">Da</option>
				<option value="0">Ne</option>

				<?php

			}
			else
			{
				?>

				<option value="1">Da</option>
				<option value="0" selected="selected">Ne</option>

				<?php 

			}

		 ?>

			</select><br>

		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<a href="editCreateObjects.php" type="button" class="btn btn-danger">Odustani</a>
			<button style="float:right;" type="button" onclick="updateObject();" class="btn btn-success">Spremi</button>
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div><br><br><br>


	</div>
	</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js" type="text/javascript"></script>
	<script>

	$(document).ready(function() {
		
	    $('#form').bootstrapValidator({
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            email: {
	                validators: {
	                    notEmpty: {
	                        message: 'Email je obavezno polje.'
	                    },
	                    emailAddress: {
	                        message: 'Unesena email adresa nije valjana.'
	                    }
	                }
	            },
	            password: {
	                validators: {
	                    notEmpty: {
	                        message: 'Potrebna je zaporka.'
	                    }
	                }
	            }
	        },
	    });

	});

	function updateObject(){

	var id = $("#inputId").val();
	var name = $("#inputName").val();
	var city = $("#inputCity").val();
	var address = $("#inputAddress").val();
	var email = $("#inputEmail").val();
	var phone = $("#inputPhone").val();
	var country = $("#inputCountry").val(); 
	var county = $("#inputCounty").val(); 
	var contact = $("#inputPhone").val(); 
	var date = $("#inputTimestamp").val();
	var contacted = $("#inputContacted").val();
	var checked = $("#inputChecked").val();  


	$.ajax({
		url: 'editObject2.php',
		type: 'POST',
		data: {

			id: id,
			name: name,
			city: city,
			address: address,
			email: email,
			phone: phone,
			country: country,
			county: county,
			contact: contact,
			date: date,
			contacted: contacted,
			checked: checked

		},
	})
	.done(function(data) {

		var data = parseInt(data);

		if (data == 1) {

			alert("Objekt uspiješno uređen!");

			location.href = 'editCreateObjects.php'; 

		}

		else
		{

			alert("Pojavila se greška, probajte ponovno!");
		}

	})
	.fail(function() {
		alert("Pojavila se greška, probajte ponovno!");

	})
	.always(function() {

	});
	}

	</script>
</body>
</html>
