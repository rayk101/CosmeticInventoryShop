<?php
require_once("cosmetics.php");

$items = Item::getItems();
foreach ($items as $item) {
    $CosmeticsID = $item->CosmeticsID;
    $CosmeticsCode = $item->CosmeticsCode;
    $CosmeticsName = $item->CosmeticsName;
    $CosmeticsDescription = $item->CosmeticsDescription;
    $CosmeticsTypeID = $item->CosmeticsTypeID;
    $CosmeticsWholesalePrice = $item->CosmeticsWholesalePrice;
    $CosmeticsListPrice = $item->CosmeticsListPrice;

    $option = "$CosmeticsID - $CosmeticsCode - $CosmeticsName - $CosmeticsDescription - Type $CosmeticsTypeID - Wholesale: $$CosmeticsWholesalePrice - List: $$CosmeticsListPrice";
    echo "$option<br>";
}
?>