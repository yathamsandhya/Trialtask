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
//include 'database.php';
class Coffee{
    private $conn;
    private $table = 'coffee';
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

public function __construct($db) {
    $this->conn = $db;
  }

  public function read() {
    $query = "SELECT * FROM '. $this->table .'"; 
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
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
        $IsKCup = $value['IsKCup'];

        $sql = "INSERT INTO 'coffee'('entity_id', 'CategoryName', 'sku', 'name', 'description', 'shortdesc', 'price', 'link', 'image', 'Brand', 'Rating', 'CaffeineType', 'Count', 'Flavored', 'Seasonal', 'Instock','Facebook', 'IsKCup')VALUES('".$entity_id."', '".$CategoryName."', '".$sku."', '".$name."', '".$description."', '".$shortdesc."', '".$price."', '".$link."', '".$image."', '".$Brand."', '".$Rating."', '".$CaffeineType."', '".$Count."', '".$Flavored."', '".$Seasonal."', '".$Instock."', '".$Facebook."', '".$IsKCup."')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':entity_id', $this->entity_id);
        $stmt->bindParam(':CategoryName', $this->CategoryName);
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':shortdesc', $this->shortdesc);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':link', $this->link);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':Brand', $this->Brand);
        $stmt->bindParam(':Rating', $this->Rating);
        $stmt->bindParam(':CaffeineType', $this->CaffeineType);
        $stmt->bindParam(':Count', $this->Count);
        $stmt->bindParam(':Flavored', $this->Flavored);
        $stmt->bindParam(':Seasonal', $this->Seasonal);
        $stmt->bindParam(':Instock', $this->Instock);
        $stmt->bindParam(':Facebook', $this->Facebook);
        $stmt->bindParam(':IsKCup', $this->IsKCup);
        if($stmt->execute()) {
            return true;
      }
      printf("Error: %s.\n", $stmt->error);

      return false;
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