<html>

<head>
   <meta http-equiv="content-type" content="text/html; charset=windows-1257" />
   <title>MySQL - SELECT</title>
</head>

<body>

   <?php

   print "Testas su MySQL duomenu baze<BR><BR>";

   //1. prisijungiam prie MySQL serverio
   $con = mysqli_connect("localhost", "root", "mysql", "testas");
   if (mysqli_connect_errno()) {
      printf('<br>Negaliu prisijungti:' . mysqli_connect_error());
   }


   //3. traukti duomenis is lenteliu
   $result = mysqli_query($con, "SELECT * FROM projektai ORDER BY ID");


   print "<TABLE border='1'>";
   print "<tr>  <td>Pavadinimas</td> <td>Aprasymas</td> <td>ID</td> <td>trinti</td> <td>Koreguoti</td>    </tr>";
   while ($row = mysqli_fetch_array($result)) {
      print "<TR><TD>" . $row['Pavadinimas'] . "</TD>";
      // print "<TD>" . $row['Vardas'] . ' - ' . $row['Miestas'] . "</TD>";
      print "<TD>" . $row['Aprasymas'] . "</TD>";
      print "<TD>" . $row['ID'] . "</TD>";
      print "<TD><a href='SQL_delete_projektai.php?ID=" . $row['ID'] . "'><img src='delete.png' border='0'></a></TD>";
      print "<TD><a href='forma_update_projektai.php?ID=" . $row['ID'] . "'><img src='edit.png' border=0></a></TD>\n";
   }
   print "</TABLE>";

   print "<a href='forma_insert_projektai.php'><img src='new.png' border='0'></a> Sukurti nauja irasa</br></br>";

   print "<a href='SQL_select.php'> Darbuotoju sarasas</a>";

   //4. atsijungiame nuo MySQL serverio
   mysqli_close($con);


   ?>

</body>

</html>