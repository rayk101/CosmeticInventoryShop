<?php
require_once('cosmetics.php');

if (!isset($_POST['CosmeticsID']) || !is_numeric($_POST['CosmeticsID'])) {
    ?>
    <h2>You did not select a valid CosmeticsID value</h2>
    <a href="index.php?content=listitems">List items</a>
    <?php
} else {
    $CosmeticsID = (int)$_POST['CosmeticsID'];
    $item = Item::findItem($CosmeticsID);

    if ($item) {
        ?>
        <h2>Update Item <?php echo htmlspecialchars($item->CosmeticsID); ?></h2><br>
        <form name="items" action="index.php" method="post">
            <table>
                <tr>
                    <td>CosmeticsID</td>
                    <td><?php echo htmlspecialchars($item->CosmeticsID); ?></td>
                </tr>
                <tr>
                    <td>CosmeticsCode</td>
                    <td><input type="text" name="CosmeticsCode" required
                               value="<?php echo htmlspecialchars($item->CosmeticsCode); ?>"></td>
                </tr>
                <tr>
                    <td>CosmeticsName</td>
                    <td><input type="text" name="CosmeticsName" required
                               value="<?php echo htmlspecialchars($item->CosmeticsName); ?>"></td>
                </tr>
                <tr>
                    <td>CosmeticsDescription</td>
                    <td><input type="text" name="CosmeticsDescription" required
                               value="<?php echo htmlspecialchars($item->CosmeticsDescription); ?>"></td>
                </tr>
                <tr>
                    <td>CosmeticsTypeID</td>
                    <td><input type="number" name="CosmeticsTypeID" required min="1"
                               value="<?php echo htmlspecialchars($item->CosmeticsTypeID); ?>"></td>
                </tr>
                <tr>
                    <td>Wholesale Price</td>
                    <td><input type="number" name="CosmeticsWholesalePrice" required step="0.01" min="0"
                               value="<?php echo htmlspecialchars($item->CosmeticsWholesalePrice); ?>"></td>
                </tr>
                <tr>
                    <td>List Price</td>
                    <td><input type="number" name="CosmeticsListPrice" required step="0.01" min="0"
                               value="<?php echo htmlspecialchars($item->CosmeticsListPrice); ?>"></td>
                </tr>
            </table><br><br>

            <input type="submit" name="answer" value="Update Item">
            <input type="submit" name="answer" value="Cancel">

            <input type="hidden" name="CosmeticsID" value="<?php echo htmlspecialchars($CosmeticsID); ?>">
            <input type="hidden" name="content" value="changeitem">
        </form>
        <?php
    } else {
        ?>
        <h2>Sorry, item <?php echo htmlspecialchars($CosmeticsID); ?> not found</h2>
        <a href="index.php?content=listitems">List items</a>
        <?php
    }
}
?>
