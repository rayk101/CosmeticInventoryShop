<style>
  .login-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }

  form[name="login"] {
    display: grid;
    grid-template-columns: 120px 1fr;
    gap: 12px 10px;
    align-items: center;
    max-width: 350px;
  }

  form[name="login"] label {
    text-align: right;
    padding-right: 5px;
  }

  form[name="login"] input[type="text"],
  form[name="login"] input[type="password"] {
    width: 100%;
    padding: 6px;
    font-size: 14px;
  }

  form[name="login"] input[type="submit"] {
    grid-column: 2 / 3;
    justify-self: start;
    padding: 4px 12px;
  }
</style>

<?php
if (!isset($_SESSION['login'])) {
?>
  <h2>Please log in to Cosmetics Store</h2>

  <div class="login-wrapper">
    <form name="login" action="index.php" method="post">
      <label>Email:</label>
      <input type="text" name="emailAddress" size="20">

      <label>Password:</label>
      <input type="password" name="password" size="20">

      <input type="submit" value="Login">
      <input type="hidden" name="content" value="validate">
    </form>
  </div>

<?php
} else {
   echo "<h2>Welcome {$_SESSION['firstName']} {$_SESSION['lastName']} ({$_SESSION['pronouns']})</h2>";
?>
   <br><br>
   <p>This program tracks cosmetic types and items inventory</p>
   <p>Please use the links in the navigation window</p>
   <p>Please DO NOT use the browser navigation buttons!</p>
   <a href="index.php?content=logout"><strong>Logout</strong></a>
<?php
}
?>
