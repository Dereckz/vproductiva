<?php
//Including Database configuration file.
require("../dev/conectar.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   $Query = "SELECT nombre FROM empresa  WHERE nombre LIKE '%$Name%' and iestatus=1 LIMIT 1";
//Query execution
   $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.
echo '
<ul>
   ';
   // Fetch the results from the database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Create list items.
        Call the JavaScript function named "fill" found in "script.js".
        Pass the fetched result as a parameter. -->
   <li onclick='fill(<?php echo $Result["nombre"]; ?>)'>
   <a>
   <!-- Display the searched result in the search box of "search.php". -->
       <?php echo $Result['nombre']; ?>
   </li></a>
   <!-- The following PHP code is only for closing parentheses. Do not be confused. -->
   <?php
}}
?>
</ul>