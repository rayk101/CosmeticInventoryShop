<?php
require_once("cosmetics.php");

// Must be POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<h2>Invalid request method</h2>";
    exit;
}

// Make sure ID exists
if (!isset($_POST['CosmeticsID']) || !is_numeric($_POST['CosmeticsID'])) {
    echo "<h2>You did not select a valid CosmeticsID value</h2>";
    echo '<br><a href="index.php?content=listitems">Back to list</a>';
    exit;
}

$CosmeticsID = (int)$_POST['CosmeticsID'];
$answer      = isset($_POST['answer']) ? $_POST['answer'] : '';

if ($answer === 'Cancel') {
    echo "<h2>Update cancelled for item {$CosmeticsID}</h2>";
    echo '<br><a href="index.php?content=listitems">Back to list</a>';
    exit;
}

if ($answer !== 'Update Item') {
    echo "<h2>Invalid action</h2>";
    echo '<br><a href="index.php?content=listitems">Back to list</a>';
    exit;
}

// Validate data
$CosmeticsCode = trim($_POST['CosmeticsCode'] ?? '');
$CosmeticsName = trim($_POST['CosmeticsName'] ?? '');
$CosmeticsDescription = trim($_POST['CosmeticsDescription'] ?? '');
$CosmeticsTypeID = (int)($_POST['CosmeticsTypeID'] ?? 0);
$CosmeticsWholesalePrice = (float)($_POST['CosmeticsWholesalePrice'] ?? 0);
$CosmeticsListPrice = (float)($_POST['CosmeticsListPrice'] ?? 0);

// Validate required fields
if (empty($CosmeticsCode) || empty($CosmeticsName) || empty($CosmeticsDescription) || 
    $CosmeticsTypeID <= 0 || $CosmeticsWholesalePrice < 0 || $CosmeticsListPrice < 0) {
    echo "<h2>Invalid data entered. Please fill in all fields with valid values.</h2>";
    echo '<br><a href="index.php?content=listitems">Back to list</a>';
    exit;
}

// Build the item from the form
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
$result = $item->updateItem();

if ($result) {
    echo "<h2>Item {$CosmeticsID} updated successfully.</h2>";
} else {
    echo "<h2>Problem updating item {$CosmeticsID}.</h2>";
}

echo '<br><a href="index.php?content=listitems">Back to list</a>';
?>
