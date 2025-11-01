<?php
require_once("cosmeticstype.php");
require_once("cosmetics.php");

// Validate input
if (!isset($_POST['CosmeticsTypeID']) || trim($_POST['CosmeticsTypeID']) === '' || !is_numeric($_POST['CosmeticsTypeID'])) {
    echo "<h2>You did not enter a valid Cosmetics Type ID.</h2>";
    echo '<a href="index.php?content=listcosmeticstypes">List Types</a>';
    exit;
}

$CosmeticsTypeID = $_POST['CosmeticsTypeID'];

// Find the category/type
$type = Category::findCategory($CosmeticsTypeID);

if ($type) {
    echo "<h2>Type #" . htmlspecialchars($type->CosmeticsTypeID) . "</h2>";
    echo "<p><strong>Type Code:</strong> " . htmlspecialchars($type->CosmeticsTypeCode) . "</p>";
    echo "<p><strong>Type Name:</strong> " . htmlspecialchars($type->CosmeticsTypeName) . "</p>";
    
    echo "<h3>Items:</h3>";

    $items = Item::findItemsByType($CosmeticsTypeID);

    if ($items && count($items) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Item ID</th><th>Item Name</th><th>List Price</th></tr>";

        foreach ($items as $item) {
            // ✅ Use the correct property names from your Item class
            $id   = htmlspecialchars($item->CosmeticsID ?? '');
            $name = htmlspecialchars($item->CosmeticsName ?? '');
            $price = htmlspecialchars($item->CosmeticsListPrice ?? '0.00');

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$name</td>";
            echo "<td>$$price</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No items found for this type.</p>";
    }
} else {
    echo "<h2>Sorry, Type #" . htmlspecialchars($CosmeticsTypeID) . " not found.</h2>";
}

echo '<br><a href="index.php?content=listcosmeticstypes">Back to List</a>';
?>
