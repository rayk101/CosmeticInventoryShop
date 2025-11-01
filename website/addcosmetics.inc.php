<?php
require_once('cosmetics.php');

$CosmeticsID               = $_POST['CosmeticsID']               ?? null;
$CosmeticsCode             = $_POST['CosmeticsCode']             ?? '';
$CosmeticsName             = $_POST['CosmeticsName']             ?? '';
$CosmeticsDescription      = $_POST['CosmeticsDescription']      ?? '';
$CosmeticsTypeID           = $_POST['CosmeticsTypeID']           ?? '';
$CosmeticsWholesalePrice   = $_POST['CosmeticsWholesalePrice']   ?? '';
$CosmeticsListPrice        = $_POST['CosmeticsListPrice']        ?? '';

if ($CosmeticsID === null || trim($CosmeticsID) === '' || !is_numeric($CosmeticsID)) {
    echo "<h2>Sorry, you must enter a valid item ID number</h2>\n";
} else {
    $item = new Item(
        $CosmeticsID,
        $CosmeticsCode,
        $CosmeticsName,
        $CosmeticsDescription,
        $CosmeticsTypeID,
        $CosmeticsWholesalePrice,
        $CosmeticsListPrice
    );

    $result = $item->saveItem();
    if ($result) {
        echo "<h2>New Item #$CosmeticsID successfully added</h2>\n";
    } else {
        echo "<h2>Sorry, there was a problem adding that item</h2>\n";
    }
}
?>
