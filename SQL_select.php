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
   $result = mysqli_query($con, "SELECT * FROM darbuotojai ORDER BY ID");


   print "<TABLE border='1'>";
   print "<tr>  <td>Vardas</td> <td>Miestas</td> <td>Amzius</td> <td>ID</td> <td>trinti</td> <td>Koreguoti</td>    </tr>";
   while ($row = mysqli_fetch_array($result)) {
      print "<TR><TD>" . $row['Vardas'] . "</TD>";
      // print "<TD>" . $row['Vardas'] . ' - ' . $row['Miestas'] . "</TD>";
      print "<TD>" . $row['Miestas'] . "</TD>";
      print "<TD>" . $row['Amzius'] . "</TD>";
      print "<TD>" . $row['ID'] . "</TD>";
      print "<TD><a href='SQL_delete.php?ID=" . $row['ID'] . "'><img src='delete.png' border='0'></a></TD>";
      print "<TD><a href='forma_update.php?ID=" . $row['ID'] . "'><img src='edit.png' border=0></a></TD>\n";
   }
   print "</TABLE>";

   print "<a href='forma_insert.php'><img src='new.png' border='0'></a> Sukurti nauja darbuotoja<br><br>";

   print "<a href='SQL_select_projektai.php'> Projektu sarasas</a>";



   //4. atsijungiame nuo MySQL serverio
   mysqli_close($con);


   ?>

</body>

</html>