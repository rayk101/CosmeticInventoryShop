<?php
require_once("cosmetics.php");

if (isset($_SESSION['login'])) {

    $CosmeticsID = filter_input(INPUT_POST, 'CosmeticsID', FILTER_VALIDATE_INT);
    $CosmeticsCode = trim(htmlspecialchars($_POST['CosmeticsCode'] ?? ''));
    $CosmeticsName = trim(htmlspecialchars($_POST['CosmeticsName'] ?? ''));
    $CosmeticsDescription = trim(htmlspecialchars($_POST['CosmeticsDescription'] ?? ''));
    $CosmeticsTypeID = filter_input(INPUT_POST, 'CosmeticsTypeID', FILTER_VALIDATE_INT);
    $CosmeticsWholesalePrice = filter_input(INPUT_POST, 'CosmeticsWholesalePrice', FILTER_VALIDATE_FLOAT);
    $CosmeticsListPrice = filter_input(INPUT_POST, 'CosmeticsListPrice', FILTER_VALIDATE_FLOAT);

    if ($CosmeticsID === false || $CosmeticsID === null) {
        echo "<h2>Sorry, you must enter a valid item ID number</h2>\n";
    }
    else if (empty($CosmeticsCode) || empty($CosmeticsName) || empty($CosmeticsDescription)) {
        echo "<h2>Sorry, you must enter all required fields</h2>\n";
    }
    else if ($CosmeticsTypeID === false || $CosmeticsTypeID === null || $CosmeticsTypeID <= 0) {
        echo "<h2>Sorry, you must enter a valid Type ID</h2>\n";
    }
    else if ($CosmeticsWholesalePrice === false || $CosmeticsWholesalePrice < 0) {
        echo "<h2>Sorry, you must enter a valid wholesale price</h2>\n";
    }
    else if ($CosmeticsListPrice === false || $CosmeticsListPrice < 0) {
        echo "<h2>Sorry, you must enter a valid list price</h2>\n";
    }
    else if (Item::findItem($CosmeticsID)) {
        echo "<h2>Sorry, item ID #$CosmeticsID already exists. Please choose another ID.</h2>\n";
    }
    else {
        $item = new Item($CosmeticsID, $CosmeticsCode, $CosmeticsName, $CosmeticsDescription, $CosmeticsTypeID, $CosmeticsWholesalePrice, $CosmeticsListPrice);
        $result = $item->saveItem();

        if ($result)
            echo "<h2>New Item #$CosmeticsID successfully added</h2>\n";
        else
            echo "<h2>Sorry, there was a problem adding that item</h2>\n";
    }

} else {
    echo "<h2>Please log in first</h2>\n";
}
?>
