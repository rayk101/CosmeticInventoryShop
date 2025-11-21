<?php
if (isset($_SESSION['login'])) {
?>
  <div class="navigation" style="float: left; height: 100%; min-width: 175px; width: auto;">
    <table width="100%" cellpadding="3">
      <?php
      echo "<td><h3>Welcome, {$_SESSION['login']}</h3></td>";
      ?>
      <tr>
        <td><img src="images/products.png" alt="Products Icon" width="12" height="12">&nbsp;
            <a href="index.php"><strong>Home</strong></a></td>
      </tr>
      <tr>
        <td><img src="images/makeup.png" alt="Makeup Icon" width="12" height="12">&nbsp;
            <strong>Types</strong></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listcosmeticstypes">
            <strong>List Types</strong></a></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newcosmetictype">
            <strong>Add New Type</strong></a></td>
      </tr>
      <tr>
        <td><strong>Items</strong></td>
      </tr>
      <tr>
        <!--points to listitems instead of listcosmetics -->
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listitems">
            <strong>List Items</strong></a></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newcosmetic">
            <strong>Add New Item</strong></a></td>
      </tr>
      <tr>
        <td>
          <hr />
        </td>
      </tr>
      <tr>
        <td><a href="index.php?content=logout">
              <img src="images/lotionproducts.png" alt="Lotion Products Icon" width="12" height="12"></a>&nbsp;
            <a href="index.php?content=logout">
              <strong>Logout</strong></a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>

      <!-- Skincare section near the bottom -->
      <tr>
        <td><img src="images/skincare.png" alt="Skincare Icon" width="12" height="12">&nbsp;
            <strong>Skincare</strong></td>
      </tr>

      <!-- Search for Item -->
      <tr>
        <td>
          <form action="index.php" method="post">
            <label>Search for Item:</label><br>
            <input type="text" name="CosmeticsID" size="14" />
            <input type="submit" value="find" />
            <input type="hidden" name="content" value="updatecosmetic" />
          </form>
        </td>
      </tr>

      <!-- Search for Types -->
      <tr>
        <td>
          <form action="index.php" method="post">
            <label>Search for Types:</label><br>
            <input type="text" name="CosmeticsTypeID" size="14" />
            <input type="submit" value="find" />
            <input type="hidden" name="content" value="displaycosmetictype" />
          </form>
        </td>
      </tr>

    </table>
  </div>
<?php
}
?>
