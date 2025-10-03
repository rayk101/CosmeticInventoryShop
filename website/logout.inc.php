<?php
if (isset($_SESSION['login'])) {
   unset($_SESSION['login']);
   unset($_SESSION['emailAddress']);
   unset($_SESSION['firstName']);
   unset($_SESSION['lastName']);
   unset($_SESSION['pronouns']);
}
if (headers_sent()) {
   echo "Click <a href=\"index.php?content=logout\"><strong>here</strong></a> to logout.";
 } else {
   header("Location: index.php");
 }
?>