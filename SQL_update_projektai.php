<html>

<head>
   <meta http-equiv="content-type" content="text/html; charset=windows-1257" />
   <title>MySQL - UPDATE</title>
</head>

<body>

   <?php

   print "Iraso atnaujinimas MySQL duomenu bazeje<BR><BR>";


   //1. prisijungiam prie MySQL serverio
   $con = mysqli_connect("localhost", "root", "mysql", "testas");
   if (mysqli_connect_errno()) {
      printf('<br>Negaliu prisijungti:' . mysqli_connect_error());
   }

   $ID = $_GET['ID'];



   mysqli_query($con, "UPDATE projektai SET Pavadinimas = '" . $_POST["pavadinimas"] . "', Aprasymas = '" . $_POST["aprasymas"] . "'  WHERE ID=" . $ID);

   print "Irasas, kurio ID " . $ID . " buvo sekmingai atnaujintas.<br>";

   print "<a href='SQL_select_projektai.php'>Grizti i sarasa</a>";

   //atsijungiame nuo MySQL serverio
   mysqli_close($con);


   ?>

</body>

</html>