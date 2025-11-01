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
        $query = "INSERT INTO Cosmetics (CosmeticsID, CosmeticsCode, CosmeticsName, CosmeticsDescription, CosmeticsTypeID, CosmeticsWholesalePrice, CosmeticsListPrice) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "isssiid",
            $this->CosmeticsID,
            $this->CosmeticsCode,
            $this->CosmeticsName,
            $this->CosmeticsDescription,
            $this->CosmeticsTypeID,
            $this->CosmeticsWholesalePrice,
            $this->CosmeticsListPrice
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
        $query = "SELECT * FROM Cosmetics WHERE CosmeticsID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $CosmeticsID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $db->close();
        if ($row) {
            return new Item(
                $row['CosmeticsID'],
                $row['CosmeticsCode'],
                $row['CosmeticsName'],
                $row['CosmeticsDescription'],
                $row['CosmeticsTypeID'],
                $row['CosmeticsWholesalePrice'],
                $row['CosmeticsListPrice']
            );
        } else {
            return NULL;
        }
    }

    function updateItem()
    {
        $db = getDB();
        $query = "UPDATE Cosmetics SET CosmeticsCode = ?, CosmeticsName = ?, CosmeticsDescription = ?, CosmeticsTypeID = ?, CosmeticsWholesalePrice = ?, CosmeticsListPrice = ? WHERE CosmeticsID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "sssiiid",
            $this->CosmeticsCode,
            $this->CosmeticsName,
            $this->CosmeticsDescription,
            $this->CosmeticsTypeID,
            $this->CosmeticsWholesalePrice,
            $this->CosmeticsListPrice,
            $this->CosmeticsID
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    function removeItem()
    {
        $db = getDB();
        $query = "DELETE FROM Cosmetics WHERE CosmeticsID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $this->CosmeticsID);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    static function getItemsByCategory($CosmeticsTypeID)
    {
        $db = getDB();
        $query = "SELECT * FROM Cosmetics WHERE CosmeticsTypeID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $CosmeticsTypeID);
        $stmt->execute();
        $result = $stmt->get_result();
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

    static function getTotalItems()
    {
        $db = getDB();
        $query = "SELECT COUNT(CosmeticsID) FROM Cosmetics";
        $result = $db->query($query);
        $row = $result->fetch_array();
        return $row ? $row[0] : NULL;
    }

    static function getTotalListPrice()
    {
        $db = getDB();
        $query = "SELECT SUM(CosmeticsListPrice) FROM Cosmetics";
        $result = $db->query($query);
        $row = $result->fetch_array();
        return $row ? $row[0] : NULL;
    }

    
    static function findItemsByType($CosmeticsTypeID)
    {
        return self::getItemsByCategory($CosmeticsTypeID);
    }
}
?>
