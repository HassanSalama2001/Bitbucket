<?php 
    include 'DVD.php';
    if(isset($_POST['delete'])){
        $products = $_POST['delete'];
        foreach($products as $product){
            $p = new DVD;
            $p->set_sku($product);
            $p->delete('products', 'SKU', $p->get_sku());
        }

        header("location: product-list.php");
    }

?>