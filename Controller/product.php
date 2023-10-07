<!-- This page should have a product class with all its methods -->
<?php

use function PHPSTORM_META\type;

    require "database.php";

    abstract class product extends Database{
        private $SKU, $Name, $Price;

        function get_sku() {
            return $this->SKU;
        }
        function set_sku($SKU) {
            $this->SKU = $SKU;
        }

        function get_name() {
            return $this->Name;
        }
        function set_name($Name) {
            $this->Name = $Name;
        }

        function get_price() {
            return $this->Price;
        }
        function set_price($Price) {
            $this->Price = $Price;
        }

        function insert_data(){
            $sql = $this->insert('products', [$this->get_sku(),$this->get_name(),$this->get_price()], ['SKU', 'pname', 'price']);

            if ($sql === TRUE) {
                echo "New record created successfully <br>";
            } 
            else {
                echo "An error Occurred";
            }
        }

        function show_products(){
            $result = $this->select('products');
            if (count($result) > 0) {
                return $result;
            }
            else {
                echo "No Data Found <br>";
            }
        }

        // function delete_product($conn){
        //     $sql = "DELETE FROM `products` WHERE `SKU` = '{$this->get_sku()}'";

        //     if ($conn->query($sql) === TRUE) {
        //         echo "New record created successfully <br>";
        //     } 
        //     else {
        //         echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
        //     }
        // }

        abstract public function describtion() : string;
    }
?> 