<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['spremi']))
{

    $mysql_host = "localhost";
    $mysql_database = "ljekarne_baza";
    $mysql_user = "ljekarne";
    $mysql_password = "b94y2KG1jl";
    
    //$id = $_POST['id'];

    $B = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database) or die(mysqli_error($B));
    
    $B->set_charset("utf8");
    
    include_once 'simplexlsx.class.php';
    $xlsx = new SimpleXLSX('Book1.xlsx');
    //print_r( $xlsx->rows()[0] );
    $i = 0;
    foreach($xlsx->rows() as $R)
    {
        


        

        $I1 = mysqli_real_escape_string($B,$R[0]); #naziv
        $I2 = mysqli_real_escape_string($B,$R[1]); #grad
        $I3 = mysqli_real_escape_string($B,$R[2]); #adresa
        $I4 = mysqli_real_escape_string($B,$R[3]); #država                
        $I5 = mysqli_real_escape_string($B,$R[4]); #županija                
        $I6 = mysqli_real_escape_string($B,$R[5]); #telefon                
        $I7 = mysqli_real_escape_string($B,$R[6]); #e-mail                
        
        //$I1 = $R[0];
        //$I2 = $R[1];
        //$I3 = $R[2];
        //$I4 = $R[3];
        
        //$T = mysqli_query($B, "SELECT naziv FROM lijekarne WHERE naziv='{$I1}'");
        //if($T->num_rows == 0 && $I1 != "")
        //{
        print($I1 . "<br>");
        $sql = "INSERT INTO lijekarne (id, naziv, grad, adresa, drzava, zupanija, telefon, email, timestamp, user, contacted, checked) VALUES (NULL, '{$I1}', '{$I2}', '{$I3}', '{$I4}', '{$I5}', '{$I6}','{$I7}','','6','','0')";
        //$sql = "INSERT INTO lijekarne (id, naziv) VALUES (NULL, '{$I1}')";
        mysqli_query($B, $sql) or die (mysqli_error($B));
        //}
        //else
        //{
        //    print($I1 . "<br>");
        //}
        
    }
    mysqli_close($B);
}
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
</head>
<body>
    <form method="post">
        <input type="submit" value="spremi" name="spremi" />

    </form>

</body>
</html>
