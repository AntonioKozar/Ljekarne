<?php 

session_start();

if (isset($_SESSION['user']))
{   

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
        <a class="navbar-brand" href="#"><?php echo $_SESSION['user']; ?></a>
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.php"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;Moji pozivi</a>
            </li>
            <li>
                <a href="object.php"><i class="glyphicon glyphicon-fire"></i>&nbsp;Ljekarne</a>
            </li>
            <li>
                <a href="print.php"><i class="glyphicon glyphicon-print"></i>&nbsp;Ispis</a>
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
                <input type="search" name="search" id="inputSearch" class="form-control" onkeyup="getReports(this.value)" value="" placeholder="Pretraga..." title="">
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <input class="form-control" value="02-16-2012" id="dp1" placeholder="Od..." type="text">
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <input class="form-control" value="02-16-2012" id="dp21" placeholder="Do..." type="text">
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <button type="button" class="btn btn-default">GO!</button>
            </div>
        </div>
        <br>
        <div class="pull-left row">
            <div class="col-lg-4">
            <select name="county" id="inputCounty" class="form-control " title="" onchange="getZupanijaReports(this.value)">
                <option selected="selected">Odaberite županiju</option>
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
            </select>
         </div>
            <div class="col-lg-3">
            <select name="city" id="inputCity" class="form-control " title="" onchange="getGradReports(this.value)">
                <option selected="selected">Odaberite grad</option>
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
            </select>
                </div>

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Broj pozvanih ljekani <span id="totals"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            </div>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Grad</th>
                        <th>Adresa</th>
                        <th>Dr&zcaron;ava</th>
                        <th>&Zcaron;upanija</th>
                        <th>Datum poziva</th>
                    </tr>
                </thead>
                <tbody id="table_rows">
                </tbody>
            </table>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootstrap-datepicker.js"></script>
        <script>

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

            function getZupanijaReports(arg) {

                var date_from = $("#dp1").val();
                var date_to = $("#dp21").val();

                arg = $("#inputCounty").val();

                $.ajax({
                    url: 'getReportsZupanija.php',
                    type: 'POST',
                    data: { from: date_from, to: date_to, string: arg },
                })
                .done(function (data) {
                    $("#table_rows").html(data);
                    counter();
                    console.log("success - županija");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
            }

            function getGradReports(arg) {

                var date_from = $("#dp1").val();
                var date_to = $("#dp21").val();

                arg = $("#inputCity").val();

                $.ajax({
                    url: 'getReportsGrad.php',
                    type: 'POST',
                    data: { from: date_from, to: date_to, string: arg },
                })
                .done(function (data) {
                    $("#table_rows").html(data);
                    counter();
                    console.log("success - grad");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
            }

            function getReports(arg) {

                var date_from = $("#dp1").val();

                var date_to = $("#dp21").val();

                arg = $("#inputSearch").val();

                $.ajax({
                    url: 'getReports.php',
                    type: 'POST',
                    data: { from: date_from, to: date_to, string: arg },
                })
                .done(function (data) {
                    $("#table_rows").html(data);
                    counter();
                    console.log("success - generalni");
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

                getReports();

                $("#dp1").val("");
                $("#dp21").val("");
            });

	</script>
</body>
</html>
