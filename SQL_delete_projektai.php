<html>

<head>
   <meta http-equiv="content-type" content="text/html; charset=windows-1257" />
   <title>MySQL - DELETE</title>
</head>

<body>
   <?php

   print "Trynimas is MySQL duomenu bazes<BR><BR>";


   //1. prisijungiam prie MySQL serverio
   $con = mysqli_connect("localhost", "root", "mysql", "testas");
   if (mysqli_connect_errno()) {
      printf('<br>Negaliu prisijungti:' . mysqli_connect_error());
   }


   $ID = $_GET['ID'];


   mysqli_query($con, "DELETE FROM projektai WHERE ID=" . $ID);

   print "Irasas, kurio ID " . $ID . " istrintas.<br>";
   print "<a href='SQL_select_projektai.php'>Grizti i sarasa</a>";

   //atsijungiame nuo MySQL serverio
   mysqli_close($con);


   ?>
</body>

</html>