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
<form id="form">
	<div class="container">



	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<input type="hidden" name="id" id="inputId" class="form-control" value=""><br>
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputId" class="col-sm-2">Ime: </label>
<input type="text" name="name" id="inputName" class="form-control" value="" required="required" pattern="" title=""><br>

			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputLastname" class="col-sm-2">Prezime: </label>
			<input type="text" name="lastname" id="inputLastname" class="form-control" value="" required="required" pattern="" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputEmail" class="col-sm-2">Email: </label>
			<input type="email" class="form-control"  name="email" id="inputEmail" required>
		</div><br>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputPassword" class="col-sm-2">Zaporka: </label>
			<input type="text" name="password" id="inputPassword" class="form-control" value="" required="required" pattern="" title="">
		</div><br>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputPhone" class="col-sm-2">Telefon: </label>

		<input type="tel" name="phone" id="inputPhone" class="form-control" value="" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputUsertype" class="col-sm-2">Vrsta korisnika: </label>

		<select name="usertype" id="inputUsertype" class="form-control">

			<option value="1" selected="selected">Administrator</option>
			<option value="2">Korisnik</option>




		</select><br>
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<a href="editCreateUsers.php" type="button" class="btn btn-danger">Odustani</a>
			<button style="float:right;" type="button" onclick="newUser();" class="btn btn-success">Spremi</button>
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>


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
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    }
                }
            }
        },
    });

	});

	function newUser(){

	var name = $("#inputName").val();
	var lastname = $("#inputLastname").val();
	var password = $("#inputPassword").val();
	var email = $("#inputEmail").val();
	var phone = $("#inputPhone").val();
	var usertype = $("#inputUsertype").val(); 

	$.ajax({
		url: 'newUser2.php',
		type: 'POST',
		data: {

			name: name,
			lastname: lastname,
			password: password,
			email: email,
			phone: phone,
			usertype: usertype

		},
	})
	.done(function(data) {

		var data = parseInt(data);

		if (data == 1) {

			alert("User sucessfully created!");

			location.href = 'editCreateUsers.php'; 

		}

		else
		{

			alert("An error occured, try again!");
		}

	})
	.fail(function() {
		alert("An error occured, try again!");

	})
	.always(function() {

	});
	}

	</script>
</body>
</html>
