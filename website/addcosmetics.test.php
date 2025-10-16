<?php
require_once('cosmetics.php');

$itemID = $_POST['CosmeticsID'];
if ((trim($itemID) == '') || (!is_numeric($itemID))) {
    echo "<h2>Sorry, you must enter a valid item ID number</h2>\n";
} else {
    $CosmeticsCode = $_POST['CosmeticsCode'];
    $CosmeticsName = $_POST['CosmeticsName'];
    $CosmeticsDescription = $_POST['CosmeticsDescription'];
    $CosmeticsTypeID = $_POST['CosmeticsTypeID'];
    $CosmeticsWholesalePrice = $_POST['CosmeticsWholesalePrice'];
    $CosmeticsListPrice = $_POST['CosmeticsListPrice'];

    $item = new Item(
        $itemID,
        $CosmeticsCode,
        $CosmeticsName,
        $CosmeticsDescription,
        $CosmeticsTypeID,
        $CosmeticsWholesalePrice,
        $CosmeticsListPrice
    );

    $result = $item->saveItem();
    if ($result)
        echo "<h2>New Item #$itemID successfully added</h2>\n";
    else
        echo "<h2>Sorry, there was a problem adding that item</h2>\n";
}
?>