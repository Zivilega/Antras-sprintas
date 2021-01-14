<?php


//1. prisijungiam prie MySQL serverio
$con = mysqli_connect("localhost", "root", "mysql", "testas");
if (mysqli_connect_errno()) {
   printf('<br>Negaliu prisijungti:' . mysqli_connect_error());
}


$ID = $_GET['ID'];


$result = mysqli_query($con, "SELECT * FROM projektai WHERE ID = $ID");
$row = mysqli_fetch_array($result);
?>


<HTML>

<HEAD>
   <TITLE>Pavyzdys su forma</TITLE>
</HEAD>

<BODY>

   <FORM ACTION="SQL_update_projektai.php?ID=<?php print $ID ?>" METHOD="POST">
      Iveskite projekto pavadinima: <INPUT TYPE="TEXT" NAME="pavadinimas" VALUE="<?php print $row['Pavadinimas'] ?>"> </BR>
      Iveskite projekto aprasyma: <INPUT TYPE="TEXT" NAME="aprasymas" VALUE="<?php print $row['Aprasymas'] ?>"> </BR>
      <INPUT TYPE="SUBMIT" NAME="OK" , VALUE="Vykdyti">
   </FORM>

</BODY>

</HTML>

<?php
mysqli_close($con);
?>