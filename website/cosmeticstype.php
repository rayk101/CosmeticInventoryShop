<?php
require_once('database.php');

class Category
{
    public $CosmeticsTypeID;
    public $CosmeticsTypeCode;
    public $CosmeticsTypeName;

    function __construct($CosmeticsTypeID, $CosmeticsTypeCode, $CosmeticsTypeName)
    {
        $this->CosmeticsTypeID = $CosmeticsTypeID;
        $this->CosmeticsTypeCode = $CosmeticsTypeCode;
        $this->CosmeticsTypeName = $CosmeticsTypeName;
    }

    function __toString()
    {
        return "<h2>Category Number: $this->CosmeticsTypeID</h2>\n" .
               "<h2>$this->CosmeticsTypeCode, $this->CosmeticsTypeName</h2>\n";
    }

    function saveCategory()
    {
        $db = getDB();
        $query = "INSERT INTO CosmeticsTypes (CosmeticsTypeID, CosmeticsTypeCode, CosmeticsTypeName) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("iss", $this->CosmeticsTypeID, $this->CosmeticsTypeCode, $this->CosmeticsTypeName);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    static function getCategories()
    {
        $db = getDB();
        $query = "SELECT * FROM CosmeticsTypes";
        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0) {
            $categories = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $category = new Category(
                    $row['CosmeticsTypeID'],
                    $row['CosmeticsTypeCode'],
                    $row['CosmeticsTypeName']
                );
                array_push($categories, $category);
            }
            $db->close();
            return $categories;
        } else {
            $db->close();
            return NULL;
        }
    }

    static function findCategory($CosmeticsTypeID)
    {
        $db = getDB();
        $query = "SELECT * FROM CosmeticsTypes WHERE CosmeticsTypeID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $CosmeticsTypeID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $db->close();

        if ($row) {
            return new Category(
                $row['CosmeticsTypeID'],
                $row['CosmeticsTypeCode'],
                $row['CosmeticsTypeName']
            );
        } else {
            return NULL;
        }
    }

    function updateCategory()
    {
        $db = getDB();
        $query = "UPDATE CosmeticsTypes SET CosmeticsTypeCode = ?, CosmeticsTypeName = ? WHERE CosmeticsTypeID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssi", $this->CosmeticsTypeCode, $this->CosmeticsTypeName, $this->CosmeticsTypeID);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    function removeCategory()
    {
        $db = getDB();
        $query = "DELETE FROM CosmeticsTypes WHERE CosmeticsTypeID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $this->CosmeticsTypeID);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }
}
?>