<h2>Enter New Type Information</h2>
<form name="newType" action="index.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>Type ID:</td>
           <td><input type="text" name="CosmeticsTypeID" size="4"></td>
       </tr>
       <tr>
           <td>Type Code:</td>
           <td><input type="text" name="CosmeticsTypeCode" size="20"></td>
       </tr>
       <tr>
           <td>Type Name:</td>
           <td><input type="text" name="CosmeticsTypeName" size="50"></td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New Type">
   <!-- index.php maps addtype -> addcosmeticstype -->
   <input type="hidden" name="content" value="addtype">
</form>
