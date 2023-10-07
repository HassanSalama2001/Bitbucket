<?php
    include "product.php";

    class DVD extends product{
        private $size;

        function get_size() {
            return $this->size;
        }
        function set_size($size) {
            $this->size = $size;
        }

        public function describtion() : string{
            return "Please, provide size";
        }
    }
?>