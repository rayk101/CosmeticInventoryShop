<script language="javascript">
function listbox_dblclick()
{
    document.categories.displaycategory.click();
}

function button_click(target)
{
    var userConfirmed = true;
    if (target == 1) {
        userConfirmed = confirm("Are you sure you want to remove this category?");
    }
    if (userConfirmed) {
        if (target == 0) categories.action = "index.php?content=displaycategory";
        if (target == 1) categories.action = "index.php?content=removecategory";
        if (target == 2) categories.action = "index.php?content=updatecategory";
    } else {
        alert("Action canceled.");
    }
}
</script>

<?php
require_once("cosmeticstype.php");

$categories = Category::getCategories();
if ($categories) {
?>
    <form name="categories" method="post">
        <select name="CosmeticsTypeID" size="5" ondblclick="listbox_dblclick()">
<?php
    foreach ($categories as $category) {
        $CosmeticsTypeID = $category->CosmeticsTypeID;
        $CosmeticsTypeCode = $category->CosmeticsTypeCode;
        $CosmeticsTypeName = $category->CosmeticsTypeName;
        
        echo "<option value=\"$CosmeticsTypeID\">ID: $CosmeticsTypeID - Code: $CosmeticsTypeCode - Name: $CosmeticsTypeName</option>";
    }
?>
        </select>
        <br>
        <input type="submit" onClick="button_click(0)" name="displaycategory" value="View Category">
        <input type="submit" onClick="button_click(1)" name="deletecategory" value="Delete Category">
        <input type="submit" onClick="button_click(2)" name="updatecategory" value="Update Category">
    </form>
<?php
} else {
    echo "<h2>No categories found</h2>";
}
?>