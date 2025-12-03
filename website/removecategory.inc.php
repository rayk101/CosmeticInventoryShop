<?php
require_once("cosmeticstype.php");

if (isset($_SESSION['login'])) {
    if (!isset($_POST['CosmeticsTypeID']) || !is_numeric($_POST['CosmeticsTypeID'])) {
        echo "<h2>You did not select a valid Category ID</h2>\n";
        echo '<a href="index.php?content=listcosmeticstype">List Categories</a>';
    } else {
        $CosmeticsTypeID = (int)$_POST['CosmeticsTypeID'];
        $category = Category::findCategory($CosmeticsTypeID);
        
        if ($category) {
            $result = $category->removeCategory();
            
            if ($result) {
                echo "<h2>Category $CosmeticsTypeID removed</h2>\n";
            } else {
                echo "<h2>Sorry, problem removing category $CosmeticsTypeID</h2>\n";
            }
        } else {
            echo "<h2>Sorry, category $CosmeticsTypeID not found</h2>\n";
        }
        echo '<br><a href="index.php?content=listcosmeticstype">List Categories</a>';
    }
} else {
    echo "<h2>Please log in first</h2>\n";
}
?>
