<h2>Enter New Type Information</h2>
<form name="newType" action="index.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>Type ID:</td>
           <td><input type="number" name="CosmeticsTypeID" size="4" min="1" max="9999" required></td>
       </tr>
       <tr>
           <td>Type Code:</td>
           <td><input type="text" name="CosmeticsTypeCode" size="20" minlength="2" maxlength="10" required placeholder="e.g., SKIN"></td>
       </tr>
       <tr>
           <td>Type Name:</td>
           <td><input type="text" name="CosmeticsTypeName" size="50" minlength="3" maxlength="100" required placeholder="e.g., Skincare"></td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New Type">
   <input type="hidden" name="content" value="addtype">
</form>
