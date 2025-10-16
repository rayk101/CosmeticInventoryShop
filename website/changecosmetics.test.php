<?php
require_once("cosmetics.php");

$CosmeticsID = $_POST['CosmeticsID'];
$item = Item::findItem($CosmeticsID);

$item->CosmeticsID = $_POST['CosmeticsID'];
$item->CosmeticsCode = $_POST['CosmeticsCode'];
$item->CosmeticsName = $_POST['CosmeticsName'];
$item->CosmeticsDescription = $_POST['CosmeticsDescription'];
$item->CosmeticsTypeID = $_POST['CosmeticsTypeID'];
$item->CosmeticsWholesalePrice = $_POST['CosmeticsWholesalePrice'];
$item->CosmeticsListPrice = $_POST['CosmeticsListPrice'];

$result = $item->updateItem();

if ($result) {
    echo "<h2>Cosmetic $CosmeticsID updated</h2>\n";
} else {
    echo "<h2>Problem updating cosmetic $CosmeticsID</h2>\n";
}
?>