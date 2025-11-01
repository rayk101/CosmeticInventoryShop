<?php
require_once('cosmetics.php');

// Cancel button
if (!isset($_POST['answer']) || $_POST['answer'] !== 'Update Item') {
    echo "<h2>Update cancelled.</h2>";
    echo '<a href="index.php?content=listcosmetics">List items</a>';
    exit;
}

// Collect data
$CosmeticsID             = $_POST['CosmeticsID']             ?? null;
$CosmeticsCode           = $_POST['CosmeticsCode']           ?? '';
$CosmeticsName           = $_POST['CosmeticsName']           ?? '';
$CosmeticsDescription    = $_POST['CosmeticsDescription']    ?? '';
$CosmeticsTypeID         = $_POST['CosmeticsTypeID']         ?? '';
$CosmeticsWholesalePrice = $_POST['CosmeticsWholesalePrice'] ?? '';
$CosmeticsListPrice      = $_POST['CosmeticsListPrice']      ?? '';

// Validate ID
if ($CosmeticsID === null || trim($CosmeticsID) === '' || !is_numeric($CosmeticsID)) {
    echo "<h2>Invalid CosmeticsID</h2>";
    echo '<a href="index.php?content=listcosmetics">List items</a>';
    exit;
}

// Create updated item
$item = new Item(
    $CosmeticsID,
    $CosmeticsCode,
    $CosmeticsName,
    $CosmeticsDescription,
    $CosmeticsTypeID,
    $CosmeticsWholesalePrice,
    $CosmeticsListPrice
);

// Try to update
if (method_exists($item, 'updateItem')) {
    $ok = $item->updateItem();
} else {
    $ok = $item->saveItem(); // fallback if no updateItem() method
}

// Feedback
if ($ok) {
    echo "<h2>Item #" . htmlspecialchars($CosmeticsID) . " successfully updated!</h2>";
} else {
    echo "<h2>Sorry, there was a problem updating that item.</h2>";
}

echo '<a href="index.php?content=listcosmetics">Back to List</a>';
?>
