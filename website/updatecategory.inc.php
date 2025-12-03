<style>
   form[name="categories"] {
       display: grid;
       grid-template-columns: 150px 1fr;
       gap: 10px 5px;
       align-items: left;
       max-width: 350px;
       margin: 0px;
   }
   form[name="categories"] label {
       text-align: left;
       padding-right: 5px;
   }
   form[name="categories"] input[type="text"] {
       width: 100%;
   }
   form[name="categories"] input[type="submit"] {
       grid-column: 2;
       justify-self: start;
       padding: 4px 12px;
   }
</style>

<?php
require_once("cosmeticstype.php");

if (isset($_SESSION['login'])) {
    $CosmeticsTypeID = $_POST['CosmeticsTypeID'];
    $category = Category::findCategory($CosmeticsTypeID);
    if ($category) {
    ?>
        <h2>Update Category <?php echo htmlspecialchars($CosmeticsTypeID); ?></h2><br>
        <form name="categories" action="index.php" method="post">
            <label for="CosmeticsTypeCode">Type Code:</label>
            <input type="text" name="CosmeticsTypeCode" id="CosmeticsTypeCode" required value="<?php echo htmlspecialchars($category->CosmeticsTypeCode); ?>">
            <label for="CosmeticsTypeName">Type Name:</label>
            <input type="text" name="CosmeticsTypeName" id="CosmeticsTypeName" required value="<?php echo htmlspecialchars($category->CosmeticsTypeName); ?>">
            <input type="submit" name="answer" value="Update Category">
            <input type="submit" name="answer" value="Cancel">
            <input type="hidden" name="CosmeticsTypeID" value="<?php echo htmlspecialchars($CosmeticsTypeID); ?>">
            <input type="hidden" name="content" value="changecategory">
        </form>
    <?php
    } else {
    ?>
        <h2>Sorry, category <?php echo htmlspecialchars($CosmeticsTypeID); ?> not found</h2>
        <a href="index.php?content=listcosmeticstype">List Categories</a>
    <?php
    }
} else {
    echo "<h2>Please log in first</h2>\n";
}
?>

<script language="javascript">
   document.categories.CosmeticsTypeCode.focus();
   document.categories.CosmeticsTypeCode.select();
</script>