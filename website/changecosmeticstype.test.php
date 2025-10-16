<?php
require_once("cosmeticstype.php");

$categoryID = $_POST['CosmeticsTypeID'];
$category = Category::findCategory($categoryID);

$category->CosmeticsTypeID = $_POST['CosmeticsTypeID'];
$category->CosmeticsTypeCode = $_POST['CosmeticsTypeCode'];
$category->CosmeticsTypeName = $_POST['CosmeticsTypeName'];

$result = $category->updateCategory();

if ($result) {
    echo "<h2>Category $categoryID updated</h2>\n";
} else {
    echo "<h2>Problem updating category $categoryID</h2>\n";
}
?>