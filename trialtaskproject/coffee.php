<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
 
<form method="post" enctype="multipart/form-data">
    <label>Title</label>
    <input type="text" name="title">
    <label>File Upload</label>
    <input type="File" name="file">
    <input type="submit" name="submit">
 
 
</form>
 
</body>
</html>

<?php
class coffee    {
    public $entity_id;
    public $CategoryName;
   public $sku;
   public $name;
   public $description;
   public $shortdesc;
public $price;
public $link;
public $image;
public $Brand;
public $Rating;
public $CaffeineType;
public $Count;
public $Flavored;
public $Seasonal;
public $Instock;
public $Facebook;
public $IsKCup;
private $table = 'coffee';

public function __construct($db) {
    $this->conn = $db;
  }

  public function read()
    {
        $db_query  = "SELECT *FROM " . $this->table_name . " ORDER BY id ASC";
        $statement = $this->connection->query($db_query);
        $statement->fetch(PDO::FETCH_ASSOC);
        $statement->execute();

        return $statement;
    }
  public function insert() {
    
    $rowaffected = 0;
    if (isset($_FILES['xmlfile']) && ($_FILES['xmlfile']['error'] == UPLOAD_ERR_OK)) {
        $xml = simplexml_load_file($_FILES['xmlfile']['tmp_name']);
    foreach ($xml->item as $value) {
        $entity_id = $value['entity_id'];
        $CategoryName = $value['CategoryName'];
        $sku = $value['sku'];
        $name = $value['name'];
        $description = $value['description'];
        $shortdesc = $value['shortdesc'];
        $price = $value['price'];
        $link = $value['link'];
        $image = $value['image'];
        $Brand = $value['Brand'];
        $Rating = $value['Rating'];
        $CaffeineType = $value['CaffeineType'];
        $Count = $value['Count'];
        $Flavored = $value['Flavored'];
        $Seasonal = $value['Seasonal'];
        $Instock = $value['Instock'];
        $Facebook = $value['Facebook'];
        $IsKCup = $value['IsKCup'];}
       try{
        $sql = "INSERT INTO 'coffee'('entity_id', 'CategoryName', 'sku', 'name', 'description', 'shortdesc', 'price', 'link', 'image', 'Brand', 'Rating', 'CaffeineType', 'Count', 'Flavored', 'Seasonal', 'Instock','Facebook', 'IsKCup')VALUES('".$entity_id."', '".$CategoryName."', '".$sku."', '".$name."', '".$description."', '".$shortdesc."', '".$price."', '".$link."', '".$image."', '".$Brand."', '".$Rating."', '".$CaffeineType."', '".$Count."', '".$Flavored."', '".$Seasonal."', '".$Instock."', '".$Facebook."', '".$IsKCup."')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':entity_id', $this->entity_id, PDO::PARAM_STR);
        $stmt->bindParam(':CategoryName', $this->CategoryName, PDO::PARAM_STR);
        $stmt->bindParam(':sku', $this->sku, PDO::PARAM_STR);
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindParam(':shortdesc', $this->shortdesc, PDO::PARAM_STR);
        $stmt->bindParam(':price', $this->price, PDO::PARAM_STR);
        $stmt->bindParam(':link', $this->link, PDO::PARAM_STR);
        $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
        $stmt->bindParam(':Brand', $this->Brand, PDO::PARAM_STR);
        $stmt->bindParam(':Rating', $this->Rating, PDO::PARAM_STR);
        $stmt->bindParam(':CaffeineType', $this->CaffeineType, PDO::PARAM_STR);
        $stmt->bindParam(':Count', $this->Count, PDO::PARAM_STR);
        $stmt->bindParam(':Flavored', $this->Flavored, PDO::PARAM_STR);
        $stmt->bindParam(':Seasonal', $this->Seasonal, PDO::PARAM_STR);
        $stmt->bindParam(':Instock', $this->Instock, PDO::PARAM_STR);
        $stmt->bindParam(':Facebook', $this->Facebook, PDO::PARAM_STR);
        $stmt->bindParam(':IsKCup', $this->IsKCup, PDO::PARAM_STR);
        $statement->execute();

        return true;
    }

     catch (PDOException $e) {
        echo "Error Message: " . $e->getMessage();
    } 
}
    }
}


?>
<div class = "alert-alert-success">
    <?php
       if(isset($msg)) {
        echo $msg;
       }
    ?>
</div>
<div class = "alert-alert-success">
    <?php
       if(!empty($errorMsg)) {
        echo $errorMsg;
       }
    ?>
</div>


</body>

</html>