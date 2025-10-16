<?php
if (!isset($_POST['CosmeticsID']) || (!is_numeric($_POST['CosmeticsID']))) {
?>
    <h2>You did not select a valid CosmeticsID value</h2>
    <a href="index.php?content=listitems">List items</a>
<?php
} else {
    $CosmeticsID = $_POST['CosmeticsID'];
    $item = Item::findItem($CosmeticsID);
    if ($item) {
?>
        <h2>Update Item <?php echo $item->CosmeticsID; ?></h2><br>
        <form name="items" action="index.php" method="post">
            <table>
                <tr>
                    <td>CosmeticsID</td>
                    <td><?php echo $item->CosmeticsID; ?></td>
                </tr>
                <tr>
                    <td>CosmeticsCode</td>
                    <td><input type="text" name="CosmeticsCode" value="<?php echo $item->CosmeticsCode; ?>"></td>
                </tr>
                <tr>
                    <td>CosmeticsName</td>
                    <td><input type="text" name="CosmeticsName" value="<?php echo $item->CosmeticsName; ?>"></td>
                </tr>
                <tr>
                    <td>CosmeticsDescription</td>
                    <td><input type="text" name="CosmeticsDescription" value="<?php echo $item->CosmeticsDescription; ?>"></td>
                </tr>
                <tr>
                    <td>CosmeticsTypeID</td>
                    <td><input type="text" name="CosmeticsTypeID" value="<?php echo $item->CosmeticsTypeID; ?>"></td>
                </tr>
                <tr>
                    <td>Wholesale Price</td>
                    <td><input type="text" name="CosmeticsWholesalePrice" value="<?php echo $item->CosmeticsWholesalePrice; ?>"></td>
                </tr>
                <tr>
                    <td>List Price</td>
                    <td><input type="text" name="CosmeticsListPrice" value="<?php echo $item->CosmeticsListPrice; ?>"></td>
                </tr>
            </table><br><br>
            <input type="submit" name="answer" value="Update Item">
            <input type="submit" name="answer" value="Cancel">
            <input type="hidden" name="CosmeticsID" value="<?php echo $CosmeticsID; ?>">
            <input type="hidden" name="content" value="changeitem">
        </form>
<?php
    } else {
?>
        <h2>Sorry, item <?php echo $CosmeticsID; ?> not found</h2>
        <a href="index.php?content=listcosmetics">List items</a>
<?php
    }
}
?>