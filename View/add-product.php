<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/JS/main.js"></script>
</head>

<body>
    <div class="container header mt-5">
        <div class="pname justify-content-start d-inline">
            <h1 class="d-inline">Product List</h1>
        </div>
        <div class="float-end">
            <button type="submit" class="btn btn-primary" form="product_form">Save</button>
            <a id="delete-product-btn" class="btn btn-danger" href="http://localhost/Scandiweb/PHP/product-list.php">Cancel</a>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form id="product_form" action="submit-product.php" method="post">
                    <table class="mb-4">
                        <tr>
                            <td>SKU</td>
                            <td><input class="form-control" type="text" name="sku" id="sku" /></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input class="form-control" type="text" name="name" id="name" /></td>
                        </tr>
                        <tr>
                            <td>Price ($)</td>
                            <td><input class="form-control" type="text" name="price" id="price" /></td>
                        </tr>
                        <tr>
                            <td>Type Switcher</td>
                            <td>
                                <select name="productType" id="productType" class="form-select" aria-label="Default select example" onchange="pType()">
                                    <option selected>Type Switcher</option>
                                    <option value="DVD">DVD</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Book">Book</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <!-- This part should open according to the selected type in previous select -->
                    <div id="DVD" class="d-none">
                        <tr>
                            <td>Size (MB)</td>
                            <td><input type="text" name="size" id="size" /></td>
                        </tr>
                        <p>Product describtion</p>
                    </div>
                    <div id="Furniture" class="d-none">
                        <tr>
                            <td>Height (CM)</td>
                            <td><input type="text" name="height" id="height" /></td>
                        </tr>
                        <tr>
                            <td>Width (CM)</td>
                            <td><input type="text" name="width" id="width" /></td>
                        </tr>
                        <tr>
                            <td>Length (CM)</td>
                            <td><input type="text" name="length" id="length" /></td>
                        </tr>
                        <p>Product describtion</p>
                    </div>
                    <div id="Book" class="d-none">
                        <tr>
                            <td>Weight (KG)</td>
                            <td><input type="text" name="weight" id="weight" /></td>
                        </tr>
                        <p>Product describtion</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function pType() {
            id = document.getElementById('productType').value;
            document.getElementById('DVD').classList.value = "d-none";
            document.getElementById('Furniture').classList.value = "d-none";
            document.getElementById('Book').classList.value = "d-none";
            document.getElementById(id).classList.value = "d-block";
        };
    </script>
    <?php include 'footer.php' ?>