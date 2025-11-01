<?php
require_once("cosmeticstype.php");

$categories = Category::getCategories();
foreach ($categories as $category) {
    $CosmeticsTypeID = $category->CosmeticsTypeID;
    $CosmeticsTypeCode = $category->CosmeticsTypeCode;
    $CosmeticsTypeName = $category->CosmeticsTypeName;

    $output = "ID: $CosmeticsTypeID - Code: $CosmeticsTypeCode - Name: $CosmeticsTypeName";
    echo "$output<br>";
}
?>