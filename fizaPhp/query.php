<?php
include('connection.php');

if(isset($_POST['insert'])){
   
    $productName = $_POST['pName'];
    $productPrice = $_POST['pPrice'];
    $productCategoryID = $_POST['c_id'];
    $productImageName = $_FILES['pImg']['name'];
    $productImageSize = $_FILES['pImg']['size'];
    $productImageTmpName = $_FILES['pImg']['tmp_name'];
    $productImageExtension = pathinfo($productImageName, PATHINFO_EXTENSION);
    $destination = 'images/'.$productImageName;

    if($productImageSize <= 48000000){
if($productImageExtension == 'jpeg' || $productImageExtension == 'jpg' || $productImageExtension == 'png' || $productImageExtension == 'webp' ||$productImageExtension == 'svg'){
if(move_uploaded_file($productImageTmpName,$destination)){
    $query = $pdo->prepare('insert into Products(productName,productPrice,productImage,categoryID) VALUES(:name,:price,:image,:category)');
    $query->bindParam('name',$productName);
    $query->bindParam('price',$productPrice);
    $query->bindParam('image',$productImageName);
    $query->bindParam('category',$productCategoryID);
    $query->execute();
    echo 'Data Inserted';

}
else{
    echo 'error';
}
}
else{
    echo 'not valid';
}
    }
    else{
        echo 'image size is too large';
    }
}


?>