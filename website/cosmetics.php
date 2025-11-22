<?php
require_once('database.php');

class Item
{
    public $CosmeticsID;
    public $CosmeticsCode;
    public $CosmeticsName;
    public $CosmeticsDescription;
    public $CosmeticsTypeID;
    public $CosmeticsWholesalePrice;
    public $CosmeticsListPrice;

    function __construct(
        $CosmeticsID,
        $CosmeticsCode,
        $CosmeticsName,
        $CosmeticsDescription,
        $CosmeticsTypeID,
        $CosmeticsWholesalePrice,
        $CosmeticsListPrice
    ) {
        $this->CosmeticsID = $CosmeticsID;
        $this->CosmeticsCode = $CosmeticsCode;
        $this->CosmeticsName = $CosmeticsName;
        $this->CosmeticsDescription = $CosmeticsDescription;
        $this->CosmeticsTypeID = $CosmeticsTypeID;
        $this->CosmeticsWholesalePrice = $CosmeticsWholesalePrice;
        $this->CosmeticsListPrice = $CosmeticsListPrice;
    }

    function __toString()
    {
        return "<h2>Cosmetic ID: $this->CosmeticsID</h2>" .
               "<h2>Code: $this->CosmeticsCode</h2>" .
               "<h2>Name: $this->CosmeticsName</h2>" .
               "<h2>Description: $this->CosmeticsDescription</h2>" .
               "<h2>Type ID: $this->CosmeticsTypeID</h2>" .
               "<h2>Wholesale: $$this->CosmeticsWholesalePrice</h2>" .
               "<h2>List: $$this->CosmeticsListPrice</h2>";
    }

    function saveItem()
    {
        $db = getDB();
        $query = "INSERT INTO Cosmetics 
                  (CosmeticsID, CosmeticsCode, CosmeticsName, CosmeticsDescription, CosmeticsTypeID, CosmeticsWholesalePrice, CosmeticsListPrice) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);

        $typeID     = (int)$this->CosmeticsTypeID;
        $wholesale  = (float)$this->CosmeticsWholesalePrice;
        $listPrice  = (float)$this->CosmeticsListPrice;

        // i, s, s, s, i, d, d
        $stmt->bind_param(
            "isssidd",
            $this->CosmeticsID,
            $this->CosmeticsCode,
            $this->CosmeticsName,
            $this->CosmeticsDescription,
            $typeID,
            $wholesale,
            $listPrice
        );

        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    static function getItems()
    {
        $db = getDB();
        $query = "SELECT * FROM Cosmetics";
        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0) {
            $items = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $item = new Item(
                    $row['CosmeticsID'],
                    $row['CosmeticsCode'],
                    $row['CosmeticsName'],
                    $row['CosmeticsDescription'],
                    $row['CosmeticsTypeID'],
                    $row['CosmeticsWholesalePrice'],
                    $row['CosmeticsListPrice']
                );
                array_push($items, $item);
            }
            $db->close();
            return $items;
        } else {
            $db->close();
            return NULL;
        }
    }

    static function findItem($CosmeticsID)
    {
        $db = getDB();
        $query = "SELECT CosmeticsID, CosmeticsCode, CosmeticsName, CosmeticsDescription, CosmeticsTypeID, CosmeticsWholesalePrice, CosmeticsListPrice FROM Cosmetics WHERE CosmeticsID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $CosmeticsID);
        $stmt->execute();
        
        $id = null;
        $code = null;
        $name = null;
        $desc = null;
        $typeID = null;
        $wholesale = null;
        $listPrice = null;
        
        $stmt->bind_result($id, $code, $name, $desc, $typeID, $wholesale, $listPrice);
        
        if ($stmt->fetch()) {
            $stmt->close();
            $db->close();
            return new Item($id, $code, $name, $desc, $typeID, $wholesale, $listPrice);
        } else {
            $stmt->close();
            $db->close();
            return NULL;
        }
    }

    function updateItem()
    {
        $db = getDB();
        
        // First, verify the record exists
        $checkQuery = "SELECT CosmeticsID FROM Cosmetics WHERE CosmeticsID = ?";
        $checkStmt = $db->prepare($checkQuery);
        $checkStmt->bind_param("i", $this->CosmeticsID);
        $checkStmt->execute();
        
        $existingID = null;
        $checkStmt->bind_result($existingID);
        
        if (!$checkStmt->fetch()) {
            echo "<p style='color:red;'>ERROR: Item ID {$this->CosmeticsID} does not exist in database!</p>";
            echo "<p>Available IDs: ";
            $allQuery = "SELECT CosmeticsID FROM Cosmetics";
            $allResult = $db->query($allQuery);
            while ($row = $allResult->fetch_array()) {
                echo $row[0] . ", ";
            }
            echo "</p>";
            $checkStmt->close();
            $db->close();
            return false;
        }
        
        $checkStmt->close();
        
        echo "<p style='color:blue;'>Record found. Updating...</p>";
        echo "<p>Code: {$this->CosmeticsCode}</p>";
        echo "<p>Name: {$this->CosmeticsName}</p>";
        
        $query = "UPDATE Cosmetics 
                  SET CosmeticsCode = ?, 
                      CosmeticsName = ?, 
                      CosmeticsDescription = ?, 
                      CosmeticsTypeID = ?, 
                      CosmeticsWholesalePrice = ?, 
                      CosmeticsListPrice = ? 
                  WHERE CosmeticsID = ?";

        $stmt = $db->prepare($query);

        if (!$stmt) {
            echo "<p style='color:red;'>Prepare failed: " . htmlspecialchars($db->error) . "</p>";
            $db->close();
            return false;
        }

        $typeID     = (int)$this->CosmeticsTypeID;
        $wholesale  = (float)$this->CosmeticsWholesalePrice;
        $listPrice  = (float)$this->CosmeticsListPrice;
        $id         = (int)$this->CosmeticsID;

        $stmt->bind_param(
            "sssiddi",
            $this->CosmeticsCode,
            $this->CosmeticsName,
            $this->CosmeticsDescription,
            $typeID,
            $wholesale,
            $listPrice,
            $id
        );

        $result = $stmt->execute();

        if (!$result) {
            echo "<p style='color:red;'>Execute failed: " . htmlspecialchars($stmt->error) . "</p>";
            $stmt->close();
            $db->close();
            return false;
        }
        
        $affectedRows = $stmt->affected_rows;
        echo "<p style='color:green;'>Rows affected: " . $affectedRows . "</p>";
        
        if ($affectedRows === 0) {
            echo "<p style='color:orange;'>WARNING: Update executed but no rows were changed. Data may be identical.</p>";
        }

        $stmt->close();
        $db->close();
        return true;
    }

    function removeItem()
    {
        $db = getDB();        $result = $stmt->execute();
        $query = "DELETE FROM Cosmetics WHERE CosmeticsID = ?";
        $stmt = $db->prepare($query);   return $result;
        $stmt->bind_param("i", $this->CosmeticsID);

    static function getItemsByCategory($CosmeticsTypeID)y($CosmeticsTypeID)
    {
        $db = getDB();
        $query = "SELECT * FROM Cosmetics WHERE CosmeticsTypeID = ?";ics WHERE CosmeticsTypeID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $CosmeticsTypeID);, $CosmeticsTypeID);
        $stmt->execute();
        $result = $stmt->get_result();lt();
        if (mysqli_num_rows($result) > 0) {) {
            $items = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {rray(MYSQLI_ASSOC)) {
                $item = new Item(
                    $row['CosmeticsID'],
                    $row['CosmeticsCode'],
                    $row['CosmeticsName'],
                    $row['CosmeticsDescription'],  $row['CosmeticsDescription'],
                    $row['CosmeticsTypeID'],],
                    $row['CosmeticsWholesalePrice'],       $row['CosmeticsWholesalePrice'],
                    $row['CosmeticsListPrice']'CosmeticsListPrice']
                );
                array_push($items, $item);array_push($items, $item);
            }
            $db->close();;
            return $items;   return $items;
        } else {   } else {
            $db->close();            $db->close();
            return NULL;
        }   }
    }

    static function getTotalItems()
    {
        $db = getDB();
        $query = "SELECT COUNT(CosmeticsID) FROM Cosmetics";   $query = "SELECT COUNT(CosmeticsID) FROM Cosmetics";
        $result = $db->query($query);        $result = $db->query($query);
        $row = $result->fetch_array();
        return $row ? $row[0] : NULL;   return $row ? $row[0] : NULL;
    }

    static function getTotalListPrice()()
    {
        $db = getDB();
        $query = "SELECT SUM(CosmeticsListPrice) FROM Cosmetics";   $query = "SELECT SUM(CosmeticsListPrice) FROM Cosmetics";
        $result = $db->query($query);        $result = $db->query($query);
        $row = $result->fetch_array();
        return $row ? $row[0] : NULL;   return $row ? $row[0] : NULL;
    }

    static function findItemsByType($CosmeticsTypeID)   static function findItemsByType($CosmeticsTypeID)
    {  {
        return self::getItemsByCategory($CosmeticsTypeID);        return self::getItemsByCategory($CosmeticsTypeID);




?>}    }    }
}
?>
