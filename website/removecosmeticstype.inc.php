<?php
require_once("cosmeticstype.php");

if (isset($_SESSION['login'])) {
    error_log("\$_POST " . print_r($_POST, true));
    $categoryID = $_POST['CosmeticsTypeID'];
    $category = Category::findCategory($categoryID);
    $result = $category->removeCategory();
    if ($result)
        echo "<h2>Category $categoryID removed</h2>\n";
    else
        echo "<h2>Sorry, problem removing category $categoryID</h2>\n";
} else {
    echo "<h2>Please log in first</h2>\n";
}
?>
