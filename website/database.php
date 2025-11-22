<?php
 function getDB() {
   $host = 'sql1.njit.edu';
   $port = 3306;
   $dbname = 'rk975';
   $username = 'rk975';
   $password = 'Umustgo247!0';
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   try {
       $db = new mysqli($host, $username, $password, $dbname, $port);
       $db->set_charset("utf8mb4");
       error_log("Connected to $host database");
       return $db;
   } catch (mysqli_sql_exception $e) {
       error_log("Database Error: " . $e->getMessage());
       echo "<p style='color:red;'>Database connection failed: " . htmlspecialchars($e->getMessage()) . "</p>";
       exit;
   }
 }
 // getDB();
?>
