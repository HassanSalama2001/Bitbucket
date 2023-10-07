<?php 
    require "connection.php";
    include "product.php";

    class Furniture extends product{
        private $length, $width, $height;

        function get_length() {
            return $this->length;
        }
        function set_length($length) {
            $this->length = $length;
        }

        function get_width() {
            return $this->width;
        }
        function set_width($width) {
            $this->width = $width;
        }

        function get_height() {
            return $this->height;
        }
        function set_height($height) {
            $this->height = $height;
        }

        public function describtion() : string{
            return "Please, provide dimensions";
        }
    }
?>