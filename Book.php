<?php 
    require "connection.php";
    include "product.php";

    class Book extends product{
        private $weight;

        function get_weight() {
            return $this->weight;
        }
        function set_weight($weight) {
            $this->weight = $weight;
        }

        public function describtion() : string{
            return "Please, provide weight";
        }
    }
?>