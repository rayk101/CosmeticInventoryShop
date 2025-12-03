<?php
require_once("cosmeticstype.php");

if (isset($_SESSION['login'])) {
    $CosmeticsTypeID = $_POST['CosmeticsTypeID'];
    $answer = isset($_POST['answer']) ? $_POST['answer'] : '';

    if ($answer === 'Cancel') {
        echo "<h2>Update Canceled for category $CosmeticsTypeID</h2>\n";
    } else if ($answer === 'Update Category') {
        $category = Category::findCategory($CosmeticsTypeID);

        $category->CosmeticsTypeID = $_POST['CosmeticsTypeID'];
        $category->CosmeticsTypeCode = $_POST['CosmeticsTypeCode'];
        $category->CosmeticsTypeName = $_POST['CosmeticsTypeName'];

        $result = $category->updateCategory();

        if ($result) {
            echo "<h2>Category $CosmeticsTypeID updated</h2>\n";
        } else {
            echo "<h2>Problem updating category $CosmeticsTypeID</h2>\n";
        }
    } else {
        echo "<h2>Invalid action</h2>\n";
    }
} else {
    echo "<h2>Please log in first</h2>\n";
}
?>
