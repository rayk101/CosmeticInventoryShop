<h2>Enter New Item Information</h2>
<form name="newitem" action="index.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>Item ID:</td>
           <td>
               <input type="number"
                      name="CosmeticsID"
                      size="4"
                      required
                      min="1"
                      max="9999">
           </td>
       </tr>
       <tr>
           <td>Item Code:</td>
           <td>
               <input type="text"
                      name="CosmeticsCode"
                      size="20"
                      required
                      minlength="3"
                      maxlength="10">
           </td>
       </tr>
       <tr>
           <td>Item Name:</td>
           <td>
               <input type="text"
                      name="CosmeticsName"
                      size="40"
                      required
                      minlength="10"
                      maxlength="100">
           </td>
       </tr>
       <tr>
           <td>Description:</td>
           <td>
               <input type="text"
                      name="CosmeticsDescription"
                      size="60"
                      required
                      minlength="100"
                      maxlength="255">
           </td>
       </tr>
       <tr>
           <td>Type ID:</td>
           <td>
               <input type="number"
                      name="CosmeticsTypeID"
                      size="4"
                      required
                      min="1"
                      max="9999">
           </td>
       </tr>
       <tr>
           <td>Wholesale Price:</td>
           <td>
               <input type="number"
                      name="CosmeticsWholesalePrice"
                      size="10"
                      required
                      min="0.01"
                      max="10000"
                      step="0.01">
           </td>
       </tr>
       <tr>
           <td>List Price:</td>
           <td>
               <input type="number"
                      name="CosmeticsListPrice"
                      size="10"
                      required
                      min="0.01"
                      max="10000"
                      step="0.01">
           </td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New Item">
   <!-- index.php maps additem -> addcosmetics -->
   <input type="hidden" name="content" value="additem">
</form>
