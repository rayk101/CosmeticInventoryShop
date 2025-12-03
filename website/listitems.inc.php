<script language="javascript">
function listbox_dblclick()
{
    document.items.displayitem.click();
}

function button_click(target)
{
    var userConfirmed = true;
    if (target == 1) {
        userConfirmed = confirm("Are you sure you want to remove this item?");
    }
    if (userConfirmed) {
        if (target == 0) items.action = "index.php?content=displayitem";
        if (target == 1) items.action = "index.php?content=removeitem";
        if (target == 2) items.action = "index.php?content=updateitem";
    } else {
        alert("Action canceled.");
    }
}
</script>

<?php
require_once("cosmetics.php");

$items = Item::getItems();
if ($items) {
?>
    <form name="items" method="post">
        <select name="CosmeticsID" size="8" ondblclick="listbox_dblclick()">
<?php
    foreach ($items as $item) {
        $CosmeticsID = $item->CosmeticsID;
        $CosmeticsCode = $item->CosmeticsCode;
        $CosmeticsName = $item->CosmeticsName;
        
        echo "<option value=\"$CosmeticsID\">ID: $CosmeticsID - Code: $CosmeticsCode - Name: $CosmeticsName</option>";
    }
?>
        </select>
        <br><br>
        <input type="submit" onClick="button_click(2)" name="updateitem" value="Update Item">
        <input type="submit" onClick="button_click(1)" name="deleteitem" value="Delete Item">
    </form>
<?php
} else {
    echo "<h2>No items found</h2>";
}
?>