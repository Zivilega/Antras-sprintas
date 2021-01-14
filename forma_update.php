<?php


//1. prisijungiam prie MySQL serverio
$con = mysqli_connect("localhost", "root", "mysql", "testas");
if (mysqli_connect_errno()) {
   printf('<br>Negaliu prisijungti:' . mysqli_connect_error());
}


$ID = $_GET['ID'];

$result = mysqli_query($con, "SELECT * FROM darbuotojai WHERE ID = $ID");
$row = mysqli_fetch_array($result);
?>


<HTML>

<HEAD>
   <TITLE>Pavyzdys su forma</TITLE>
</HEAD>

<BODY>

   <FORM ACTION="SQL_update.php?ID=<?php print $ID ?>" METHOD="POST">
      Iveskite varda: <INPUT TYPE="TEXT" NAME="vardas" VALUE="<?php print $row['Vardas'] ?>"> </BR>
      Iveskite miesta: <INPUT TYPE="TEXT" NAME="miestas" VALUE="<?php print $row['Miestas'] ?>"> </BR>
      Nurodykite amziu: <INPUT TYPE="TEXT" NAME="amzius" VALUE="<?php print $row['Amzius'] ?>"> </BR>
      <INPUT TYPE="SUBMIT" NAME="OK" , VALUE="Vykdyti">
   </FORM>

</BODY>

</HTML>

<?php
mysqli_close($con);
?>