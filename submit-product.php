<?php 
    include 'DVD.php';
    if($_POST){
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $type = $_POST['productType'];
        $size = $_POST['size'];
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        $weight = $_POST['weight'];
        
        $product = new $type;

        $product->set_sku($sku);
        $product->set_name($name);
        $product->set_price($price);

        $product->insert_data();

        echo($product->get_sku(). "<br>");
        echo($product->get_name(). "<br>");
        echo($product->get_price(). "<br>");
        header("location: product-list.php");
    }

?>