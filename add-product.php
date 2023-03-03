<div class="container">
        <div class="row">
            <div class="col">
                <form id="product_form">
                    <input type="text" name="sku" id="sku"/>
                    <input type="text" name="name" id="name"/>
                    <input type="text" name="price" id="price"/>
                    <select id="productType" class="form-select" aria-label="Default select example">
                        <option selected>Type Switcher</option>
                        <option value="DVD">DVD</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Book">Book</option>
                    </select>
                    <!-- This part should open according to the selected type in previous select -->
                    <div id="size">
                        <input type="text" name="size" id="size" />
                        <p>Product describtion</p>
                    </div>
                    <div id="Furniture">
                        <input type="text" name="height" id="height" />
                        <input type="text" name="width" id="width" />
                        <input type="text" name="length" id="length" />
                        <p>Product describtion</p>
                    </div>
                    <div id="size">
                        <input type="text" name="weight" id="weight" />
                        <p>Product describtion</p>
                    </div>
                </form>
            </div>
        </div>
    </div>