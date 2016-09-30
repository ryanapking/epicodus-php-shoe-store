<?php
    class Store
    {
        private $id;
        private $name;

        function __construct($name, $id = null)
        {
            $this->id = $id;
            $this->name = $name;
        }

        function save()
        {

        }

        function delete()
        {

        }

        function update()
        {

        }

        function getBrandList()
        {

        }

        function addBrand()
        {

        }

        function deleteBrand()
        {

        }

    // static functions
        static function findById()
        {

        }

        static function deleteAll()
        {

        }

        static function getAll()
        {

        }

    // getters and setters
        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }
    }
 ?>
