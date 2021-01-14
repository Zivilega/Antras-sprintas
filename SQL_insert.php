<html>

<head>
   <meta http-equiv="content-type" content="text/html; charset=windows-1257" />
   <title>MySQL - INSERT</title>
</head>

<body>

   <?php

   print "Iraso itraukimas MySQL duomenu bazeje<BR><BR>";


   //1. prisijungiam prie MySQL serverio
   $con = mysqli_connect("localhost", "root", "mysql", "testas");
   if (mysqli_connect_errno()) {
      printf('<br>Negaliu prisijungti:' . mysqli_connect_error());
   }



   mysqli_query($con, "INSERT INTO darbuotojai (Vardas, Miestas, Amzius) VALUES ('" . $_POST["vardas"] . "', '" . $_POST["miestas"] . "', " . $_POST["amzius"] . ")");

   print "irasas, buvo sekmingai sukurtas.<br>";

   print "<a href='SQL_select.php'>Grizti i sarasa</a>";

   //atsijungiame nuo MySQL serverio
   mysqli_close($con);


   ?>
</body>

</html>