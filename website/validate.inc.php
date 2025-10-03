<?php
 error_log("\$_POST " . print_r($_POST, true));
 require_once('database.php');
 $emailAddress = $_POST['emailAddress'];
 $password = $_POST['password'];
 $query = "SELECT firstName, lastName, pronouns FROM CosmeticsManagers
WHERE emailAddress = ? AND password = SHA2(?,256)";
$db = getDB();
$stmt = $db->prepare($query);
$stmt->bind_param("ss", $emailAddress, $password);
$stmt->execute();
$stmt->bind_result($firstName, $lastName, $pronouns);
$fetched = $stmt->fetch();
$name = "$firstName $lastName ($pronouns)";
 if ($fetched && isset($name)) {
   echo "<h2>Welcome to Cosmetic Store, $name</h2>\n";
      $_SESSION['login'] = true;
      $_SESSION['emailAddress'] = $emailAddress;
      $_SESSION['firstName'] = $firstName;
      $_SESSION['lastName'] = $lastName;
      $_SESSION['pronouns'] = $pronouns;
   header("Location: index.php");
 } else {
   echo "<h2>Sorry, login incorrect</h2>\n";
   echo "<a href=\"index.php\">Please try again</a>\n";
 }
?>
