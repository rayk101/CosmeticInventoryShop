<?php
ini_set('display_errors', 1); // Enable for development
ini_set('log_errors', 1);
error_reporting(E_ALL);

set_error_handler(function ($severity, $message, $file, $line) {
  $errorMsg = "Error: [$severity] $message in $file on line $line";
  error_log($errorMsg);
  echo "<p style='color:red;'>$errorMsg</p>";
  // Uncomment for production:
  // include 'statuscode500.php';
  // exit();
});

set_exception_handler(function ($exception) {
  $errorMsg = "Exception: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine();
  error_log($errorMsg);
  echo "<p style='color:red;'>$errorMsg</p>";
  // Uncomment for production:
  // include 'statuscode500.php';
  // exit();
});

register_shutdown_function(function () {
  $error = error_get_last();
  if ($error !== NULL) {
     error_log("Fatal: " . $error['message'] . " in " . $error['file'] . " on line " . $error['line']);
     echo "<p style='color:red;'>Fatal error occurred</p>";
     // Uncomment for production:
     // include 'statuscode500.php';
  }
});
?>