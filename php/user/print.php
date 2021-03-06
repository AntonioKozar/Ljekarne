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
            <li>
                <a href="index.php"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;Moji pozivi</a>
            </li>
            <li>
                <a href="object.php"><i class="glyphicon glyphicon-fire"></i>&nbsp;Ljekarne</a>
            </li>
            <li class="active">
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
        <div>

            <button type="button" class="btn btn-success" style="float: right" onclick="printDiv('printableArea')">Isprintaj tablicu  <i class="glyphicon glyphicon-print"></i></button>

            <div class="checkbox" style="float: right">
                <label><input id="poziv" onchange="getReportsPoziv(this.value)" type="checkbox">Odrađene ljekarne  &nbsp;&nbsp;&nbsp;</label>


            </div>
            <div class="row ">
                <div class="col-lg-4">
                    <select name="county" id="inputCounty" class="form-control " title="" onchange="getReportsZupanija(this.value)">
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
                    <select name="city" id="inputCity" class="form-control " title="" onchange="getReportsGrad(this.value)">
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
            </div>


            <div class="row" id="printableArea">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Naziv</th>
                            <th>Grad</th>
                            <th>Telefon</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="table_rows">
                    </tbody>
                </table>
            </div>

        </div>

        <div class="modal fade" id="details">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Zatvori</span></button>
                        <h4 class="modal-title">Detalji o ljekarni: <strong style="font-weight: bold;"></strong></h4>
                    </div>
                    <div class="modal-body" id="modaldetails">
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootstrap-datepicker.js"></script>
        <script>
            var strings;
            function savestring(sstring) {

                strings = sstring;

                //alert(strings);
            }
            function checkit(id) {

                //alert(strings);

                $.ajax({
                    url: 'checkit.php',
                    type: 'POST',
                    data: { id: id, string: strings }
                })
                .done(function (data) {
                    var data = parseInt(data);
                    if (data == 1) {
                        getReports();
                        alert("Object successfully checked/processed!");

                    }
                    else {

                        alert("An error occured, try again!");

                    }
                    console.log("success");
                })
                .fail(function () {

                    alert("An error occured, try again!");
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });


            }

            function showModal(id) {

                $.ajax({

                    url: 'objectDetails.php',
                    type: 'POST',
                    data: { id: id }

                })
                .done(function (data) {
                    $("#modaldetails").html(data);
                    console.log("success");
                })
                .fail(function () {
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

            function editObject(arg) {

                location.href = 'editObject.php?id=' + arg;

            }

            function getReportsPoziv(arg) {

                var date_from = $("#dp1").val();

                var date_to = $("#dp21").val();

                if ($("#poziv").prop('checked'))
                {
                    arg = 1;
                } else {
                    arg = 0;
                }
                
                console.log(arg);

                $.ajax({
                    url: 'getObjectsForPrintPoziv.php',
                    type: 'POST',
                    data: { from: date_from, to: date_to, string: arg },
                })
                .done(function (data) {
                    $("#table_rows").html(data);
                    counter();
                    console.log("success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
            }

            function getReportsZupanija(arg) {

                var date_from = $("#dp1").val();

                var date_to = $("#dp21").val();

                arg = $("#inputCounty").val();

                $.ajax({
                    url: 'getObjectsForPrintZupanija.php',
                    type: 'POST',
                    data: { from: date_from, to: date_to, string: arg },
                })
                .done(function (data) {
                    $("#table_rows").html(data);
                    counter();
                    console.log("success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
            }

            function getReportsGrad(arg) {

                var date_from = $("#dp1").val();

                var date_to = $("#dp21").val();

                arg = $("#inputCity").val();

                $.ajax({
                    url: 'getObjectsForPrintGrad.php',
                    type: 'POST',
                    data: { from: date_from, to: date_to, string: arg },
                })
                .done(function (data) {
                    $("#table_rows").html(data);
                    counter();
                    console.log("success");
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
                    url: 'getObjectsForPrint.php',
                    type: 'POST',
                    data: { from: date_from, to: date_to, string: arg },
                })
                .done(function (data) {
                    $("#table_rows").html(data);
                    counter();
                    console.log("success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
            }

            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
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
