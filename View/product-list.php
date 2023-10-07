<?php 
    include 'header.php';
    include 'DVD.php';
    $products = new DVD;
    $results = $products->show_products();
    print_r(sizeof($results));die;
?>
<div class="container">
    <form id="delete_form" action="delete-product.php" method="post">
        <div class="row">
            <?php foreach($results as $product) { ?>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="productType" value="<?= $product['SKU'] ?>">
                            <input type="checkbox" name="delete[]" value="<?= $product['SKU'] ?>" class="delete-checkbox">
                            <div class="card-text text-center">
                                <p><?= $product['SKU'] ?></p>
                                <p><?= $product['pname'] ?></p>
                                <p><?= $product['price'] ?></p>
                                <p>Product Desc</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </form>
</div>
<?php include 'footer.php' ?>