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

$getMail = mysql_query("SELECT * FROM emails WHERE id=1;");

$getMail2 = mysql_fetch_assoc($getMail);

if (isset($_FILES['file'])) {

	if ($_FILES["file"]["error"] > 0) {
		echo '<script>alert("greška s privitkom, pokušajte ponovno")</script>';
	} else {

        $imageName = 'attachments/privitak.' . pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["file"]["tmp_name"],
        $path_image . $imageName);

	}

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
            <li>
                <a href="editCreateUsers.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Uredi/dodaj korisnika</a>
            </li>
            <li class="active">
                <a href="emails.php"><i class="glyphicon glyphicon-envelope"></i>&nbsp;Email</a>
            </li>
            <li>
                <a href="logout.php"><i class="glyphicon glyphicon-off"></i>&nbsp;Odjava</a>
            </li>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            </div>
            
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="privitak" style="border:1px solid #aaa;padding:3.14%; border-radius:15px;">
                
                <button class="btn btn-default pull-left" onclick="document.getElementById('file').click()">Odaberite privitak</button>
                <form action="emails.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" id="file" style="display: none">
                    <input type="submit" name="submit" class="btn btn-success pull-right" value="Dodaj privitak">
                </form>
            </div>

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>
    <br>
<div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="border:1px solid #aaa;padding:3.14%; border-radius:15px;">
            <label for="mail">Tko prima e-mail:</label>
            <select name="county" id="inputCounty" class="form-control " title="">
                <option selected="selected" value="">Odaberite županiju*</option>
                <option value="Bjelovarsko-bilogorska">Bjelovarsko-bilogorska</option>
                <option value="Brodsko-posavska">Brodsko-posavska</option>
                <option value="Dubrovačko-neretvanska">Dubrovačko-neretvanska</option>
                <option value="Istarska">Istarska</option>
                <option value="Karlovačka">Karlovačka</option>
                <option value="Koprivničko-križevačka">Koprivničko-križevačka</option>
                <option value="Krapinsko-zagorska">Krapinsko-zagorska</option>
                <option value="Ličko-senjska">Ličko-senjska</option>
                <option value="Međimurska">Međimurska</option>
                <option value="Osječko-baranjska">Osječko-baranjska</option>
                <option value="Požeško-slavonska">Požeško-slavonska</option>
                <option value="Primorsko-goranska">Primorsko-goranska</option>
                <option value="Sisačko-moslavačka">Sisačko-moslavačka</option>
                <option value="Splitsko-dalmatinska">Splitsko-dalmatinska</option>
                <option value="Varaždinska">Varaždinska</option>
                <option value="Virovitičko-podravska">Virovitičko-podravska</option>
                <option value="Vukovarsko-srijemska">Vukovarsko-srijemska</option>
                <option value="Zadarska">Zadarska</option>
                <option value="Zagrebačka">Zagrebačka</option>
                <option value="Šibensko-kninska">Šibensko-kninska</option>
                <option value="Grad Zagreb">Grad Zagreb</option>
                <!--<option value="test">TEST</option>-->
            </select>
            <select name="city" id="inputCity" class="form-control " title="" style="margin-top:1%;">
                <option selected="selected" value="">Odaberite grad*</option>
                <option value="Bakar">Bakar</option>
                <option value="Beli Manastir">Beli Manastir</option>
                <option value="Belišće">Belišće</option>
                <option value="Benkovac">Benkovac</option>
                <option value="Biograd na Moru">Biograd na Moru</option>
                <option value="Bjelovar">Bjelovar</option>
                <option value="Buje">Buje</option>
                <option value="Buzet">Buzet</option>
                <option value="Cres">Cres</option>
                <option value="Crikvenica">Crikvenica</option>
                <option value="Čabar">Čabar</option>
                <option value="Čakovec">Čakovec</option>
                <option value="Čazma">Čazma</option>
                <option value="Daruvar">Daruvar</option>
                <option value="Delnice">Delnice</option>
                <option value="Donja Stubica">Donja Stubica</option>
                <option value="Donji Miholjac">Donji Miholjac</option>
                <option value="Drniš">Drniš</option>
                <option value="Dubrovnik">Dubrovnik</option>
                <option value="Duga Resa">Duga Resa</option>
                <option value="Dugo Selo">Dugo Selo</option>
                <option value="Đakovo">Đakovo</option>
                <option value="Đurđevac">Đurđevac</option>
                <option value="Garešnica">Garešnica</option>
                <option value="Glina">Glina</option>
                <option value="Gospić">Gospić</option>
                <option value="Grubišno Polje">Grubišno Polje</option>
                <option value="Hrvatska Kostajnica">Hrvatska Kostajnica</option>
                <option value="Hvar">Hvar</option>
                <option value="Ilok">Ilok</option>
                <option value="Imotski">Imotski</option>
                <option value="Ivanec">Ivanec</option>
                <option value="Ivanić-Grad">Ivanić-Grad</option>
                <option value="Jastrebarsko">Jastrebarsko</option>
                <option value="Karlovac">Karlovac</option>
                <option value="Kastav">Kastav</option>
                <option value="Kaštela">Kaštela</option>
                <option value="Klanjec">Klanjec</option>
                <option value="Knin">Knin</option>
                <option value="Komiža">Komiža</option>
                <option value="Koprivnica">Koprivnica</option>
                <option value="Korčula">Korčula</option>
                <option value="Kraljevica">Kraljevica</option>
                <option value="Krapina">Krapina</option>
                <option value="Križevci">Križevci</option>
                <option value="Krk">Krk</option>
                <option value="Kutina">Kutina</option>
                <option value="Kutjevo">Kutjevo</option>
                <option value="Labin">Labin</option>
                <option value="Lepoglava">Lepoglava</option>                
                <option value="Lipik">Lipik</option>
                <option value="Ludbreg">Ludbreg</option>
                <option value="Makarska">Makarska</option>
                <option value="Mali Lošinj">Mali Lošinj</option>
                <option value="Metković">Metković</option>
                <option value="Mursko Središće">Mursko Središće</option>
                <option value="Našice">Našice</option>
                <option value="Nin">Nin</option>
                <option value="Nova Gradiška">Nova Gradiška</option>
                <option value="Novalja">Novalja</option>
                <option value="Novi Marof">Novi Marof</option>
                <option value="Novi Vinodolski">Novi Vinodolski</option>
                <option value="Novigrad">Novigrad</option>
                <option value="Novska">Novska</option>
                <option value="Obrovac">Obrovac</option>
                <option value="Ogulin">Ogulin</option>
                <option value="Omiš">Omiš</option>
                <option value="Opatija">Opatija</option>
                <option value="Opuzen">Opuzen</option>
                <option value="Orahovica">Orahovica</option>
                <option value="Oroslavje">Oroslavje</option>
                <option value="Osijek">Osijek</option>
                <option value="Otočac">Otočac</option>
                <option value="Otok">Otok</option>
                <option value="Ozalj">Ozalj</option>
                <option value="Pag">Pag</option>
                <option value="Pakrac">Pakrac</option>
                <option value="Pazin">Pazin</option>
                <option value="Petrinja">Petrinja</option>
                <option value="Pleternica">Pleternica</option>
                <option value="Ploče">Ploče</option>
                <option value="Popovača">Popovača</option>
                <option value="Poreč">Poreč</option>
                <option value="Požega">Požega</option>
                <option value="Pregrada">Pregrada</option>
                <option value="Prelog">Prelog</option>
                <option value="Pula">Pula</option>
                <option value="Rab">Rab</option>
                <option value="Rijeka">Rijeka</option>
                <option value="Rovinj">Rovinj</option>
                <option value="Samobor">Samobor</option>
                <option value="Senj">Senj</option>
                <option value="Sinj">Sinj</option>
                <option value="Sisak">Sisak</option>
                <option value="Skradin">Skradin</option>
                <option value="Slatina">Slatina</option>
                <option value="Slavonski Brod">Slavonski Brod</option>
                <option value="Slunj">Slunj</option>
                <option value="Solin">Solin</option>
                <option value="Split">Split</option>
                <option value="Stari Grad">Stari Grad</option>
                <option value="Supetar">Supetar</option>
                <option value="Sveta Nedelja">Sveta Nedelja</option>
                <option value="Sveti Ivan Zelina">Sveti Ivan Zelina</option>
                <option value="Šibenik">Šibenik</option>
                <option value="Trilj">Trilj</option>
                <option value="Trogir">Trogir</option>
                <option value="Umag">Umag</option>
                <option value="Valpovo">Valpovo</option>
                <option value="Varaždin">Varaždin</option>
                <option value="Varaždinske Toplice">Varaždinske Toplice</option>
                <option value="Velika Gorica">Velika Gorica</option>
                <option value="Vinkovci">Vinkovci</option>
                <option value="Virovitica">Virovitica</option>
                <option value="Vis">Vis</option>
                <option value="Vodice">Vodice</option>
                <option value="Vodnjan">Vodnjan</option>
                <option value="Vrbovec">Vrbovec</option>
                <option value="Vrbovsko">Vrbovsko</option>
                <option value="Vrgorac">Vrgorac</option>
                <option value="Vrlika">Vrlika</option>
                <option value="Vukovar">Vukovar</option>
                <option value="Zabok">Zabok</option>
                <option value="Zadar">Zadar</option>
                <option value="Zagreb">Zagreb</option>
                <option value="Zaprešić">Zaprešić</option>
                <option value="Zlatar">Zlatar</option>
                <option value="Županja">Županja</option>
                <!--<option value="test">TEST</option>-->
            </select>
            <p>* Ukoliko ne odaberete zadano polje, sva polja su odabrana.</p>
            <label class="pull-right" style="margin-top:1%;">Samo oni koji su pozvani: <input id="pozvani" type="checkbox" value=""></label>
            <label class="pull-right" >Zanemari sve i šalji svima: <input id="zanemari" type="checkbox" value="" onchange="svi()"></label>
            
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>
    <br>
    <div class="row" >
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="border:1px solid #aaa;padding:3.14%; border-radius:15px;">
            <label for="title">Naslov e-maila:</label>
            <input type="text" name="title" id="inputTitle" class="form-control" value=" <?php echo $getMail2['title']; ?> " required="required" pattern="" title="">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="border:1px solid #aaa;padding:3.14%; border-radius:15px;">
            <label for="mail">Sadržaj e-maila:</label>
            <textarea rows="8" cols="25" name="mail" id="inputMail" class="form-control" value="<?php echo $getMail2['text']; ?>" required="required" pattern="" title=""><?php echo $getMail2['text']; ?></textarea>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>
        <br/>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <button type="button" style="float: left;" class="btn btn-warning" onclick="send_email();" name="posalji">Pošalji</button>
                    <button type="button" style="float: right;" class="btn btn-success" onclick="saveEmail();">Spremi</button>
        </br/></br>
            <label id="info"></label>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            Trenutni privitak: <a href="<?php 	$query = mysql_query("SELECT path FROM attach WHERE id = 1 LIMIT 1"); $queryy = mysql_fetch_assoc($query); echo $queryy['path']; ?>">Pogledaj Privitak</a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>

    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap-datepicker.js"></script>
    <script>
        function svi()
        {
            if (document.getElementById("zanemari").checked) {
                document.getElementById("inputCity").disabled = true;
                document.getElementById("inputCounty").disabled = true;
                document.getElementById("pozvani").disabled = true;
            } else {
                document.getElementById("inputCity").disabled = false;
                document.getElementById("inputCounty").disabled = false;
                document.getElementById("pozvani").disabled = false;
            }
        }

        function saveEmail() {

            var email = $("#inputMail").val();
            var title = $("#inputTitle").val();

            $.ajax({
                url: 'saveEmail.php',
                type: 'POST',
                data: { email: email, title: title },
            })
            .done(function (data) {
                var data = parseInt(data);

                if (data == 1) {

                    alert("Uređivanje emaila uspješno odrađeno!");

                }
                else {
                    alert("Došlo je do pogreške, pokušajte ponovno!");
                }

                console.log("success");
            })
            .fail(function () {
                alert("Došlo je do pogreške, pokušajte ponovno!");
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });


        }

        function counter() {

            var from = $("#dp1").val();
            var to = $("#dp21").val();

            $.ajax({
                url: 'counter.php',
                type: 'POST',
                data: { from: from, to: to }
            })
            .done(function (data) {
                $("#totals").html(data);
                console.log("success");
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });


        }

        function send_email() {

            
            var zanemari = $("#zanemari").prop('checked'); //Zanemari sve i šalji svima
            var pozvani = $("#pozvani").prop('checked'); //Samo oni koji su pozvani
            if (zanemari) {
                zanemari_sve = 1;
            } else {
                zanemari_sve = 0;
            }

            if (pozvani) {

                pozovi_sve = 1;
            }
            else {

                pozovi_sve = 0;
            }
             grad = $("#inputCity").val();
            zupanija = $("#inputCounty").val();
            console.log(grad + " - grad");
            console.log(zupanija + " - zupanija");
            console.log(zanemari_sve + " - zanemari sve");
            console.log(pozovi_sve + " - pozivani");
            console.log("Poslano");
            document.getElementsByName('posalji').disabled = true;
            $.ajax({
                url: 'emailto.php',
                type: 'POST',
                data: { checked: zanemari_sve, grad: grad, zupanija: zupanija, svi: pozovi_sve },
            })
            .done(function (data) {

                alert("Mail je poslan svim označenim ljekarnama!")
                $("#info").html("Uspješno poslanih emailova: " + data);
                console.log("<h3>Uspješno poslano:</h3>" + data + " emailova.");
                document.getElementsByName('posalji').disabled = false;
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });
        }

        function sendToAll() {

            $.ajax({
                url: 'mailToAll.php',
                type: 'GET'
            })
            .done(function (data) {

                alert("Mail je poslan svim označenim ljekarnama!")

                console.log("success");
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });


        }

                if (top.location != location) {
            top.location.href = document.location.href;
        }
        $(function () {
            window.prettyPrint && prettyPrint();
            $('#dp1').datepicker({
                format: 'mm-dd-yyyy'
            });
            $('#dp21').datepicker({
                format: 'mm-dd-yyyy'
            });
            $("#dp1").val("");
            $("#dp21").val("");
        });

        $(document).ready(function () {

            $("#dp1").val("");
            $("#dp21").val("");
        });

	</script>
</body>
</html>
