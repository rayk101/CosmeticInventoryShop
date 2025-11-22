<?php
require_once("cosmeticstype.php");

if (isset($_SESSION['login'])) {

    $CosmeticsTypeID   = filter_input(INPUT_POST, 'CosmeticsTypeID', FILTER_VALIDATE_INT);
    $CosmeticsTypeCode = htmlspecialchars($_POST['CosmeticsTypeCode'] ?? '');
    $CosmeticsTypeName = htmlspecialchars($_POST['CosmeticsTypeName'] ?? '');

    if ((trim($CosmeticsTypeID) == '') || (!is_int($CosmeticsTypeID))) {
        echo "<h2>Sorry, you must enter a valid type ID number</h2>\n";
    }

    else if (Category::findCategory($CosmeticsTypeID)) {
        echo "<h2>Sorry, type ID #$CosmeticsTypeID already exists. Please choose another ID.</h2>\n";
    }

    else {
        $category = new Category($CosmeticsTypeID, $CosmeticsTypeCode, $CosmeticsTypeName);
        $result   = $category->saveCategory();

        if ($result)
            echo "<h2>New Type #$CosmeticsTypeID successfully added</h2>\n";
        else
            echo "<h2>Sorry, there was a problem adding that type</h2>\n";
    }

} else {
    echo "<h2>Please log in first</h2>\n";
}
?>
