<!--php require 'connection.php' ?-->
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container header mt-5">
        <div class="pname justify-content-start d-inline">
            <h1 class="d-inline">Product List</h1>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" href="http://localhost/Scandiweb/PHP/add-product.php">ADD</a>
            <!-- delete should be done using JS -->
            <button type="submit" id="delete-product-btn" class="btn btn-danger" form="delete_form" >MASS DELETE</button>
        </div>
        <hr>
    </div>