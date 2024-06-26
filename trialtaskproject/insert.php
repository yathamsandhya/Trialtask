<?php
include "inc/header.php";
include "utility/autoload.php";

$crud = new Crud;
$validation = new Validation;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $err_message = $validation->check_empty_field($_POST, ['f_entity_id', 'f_CategoryName', 'f_sku', 'f_name', 'f_description', 'f_shortdesc', 'f_price', 'f_link', 'f_image', 'f_Brand', 'f_Rating', 'f_CaffeineType', 'f_Count', 'f_Flavored', 'f_Seasonal', 'f_Instock', 'f_Facebook', 'f_IsKCup']);

    $crud->entity_id    = $_POST['f_entity_id'];
    $crud->CategoryName   = $_POST['f_CategoryName'];
    $crud->sku = $_POST['f_sku'];
    $crud->name = $_POST['f_name'];
    $crud->description = $_POST['f_description'];
    $crud->shortdesc = $_POST['f_shortdesc'];
    $crud->price = $_POST['f_price'];
    $crud->link = $_POST['f_link'];
    $crud->image = $_POST['f_image'];
    $crud->Brand = $_POST['f_Brand'];
    $crud->Rating = $_POST['f_Rating'];
    $crud->CaffeineType = $_POST['f_CaffeineType'];
    $crud->Count = $_POST['f_Count'];
    $crud->Flavored = $_POST['f_Flavored'];
    $crud->Seasonal = $_POST['f_Seasonal'];
    $crud->Instock = $_POST['f_Instock'];
    $crud->Facebook = $_POST['f_Facebook'];
    $crud->IsKCup = $_POST['f_IsKCup'];
    if($err_message != null){
        echo $err_message;
    }
    else{
        $store_data = $crud->create();

        if($store_data){
            header("location:index.php?record_add_status=success");      
    }
}
}

?>
