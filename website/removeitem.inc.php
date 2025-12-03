<?php
require_once("cosmetics.php");

if (isset($_SESSION['login'])) {
    if (!isset($_POST['CosmeticsID']) || !is_numeric($_POST['CosmeticsID'])) {
        echo "<h2>You did not select a valid Item ID</h2>\n";
        echo '<a href="index.php?content=listitems">List Items</a>';
    } else {
        $CosmeticsID = (int)$_POST['CosmeticsID'];
        $item = Item::findItem($CosmeticsID);
        
        if ($item) {
            $result = $item->removeItem();
            
            if ($result) {
                echo "<h2>Item $CosmeticsID removed</h2>\n";
            } else {
                echo "<h2>Sorry, problem removing item $CosmeticsID</h2>\n";
            }
        } else {
            echo "<h2>Sorry, item $CosmeticsID not found</h2>\n";
        }
        echo '<br><a href="index.php?content=listitems">List Items</a>';
    }
} else {
    echo "<h2>Please log in first</h2>\n";
}
?>
