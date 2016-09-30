<?php
    class Brand
    {
        private $id;
        private $name;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('{$this->name}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {

        }

        function update()
        {

        }

        function getStoreList()
        {

        }

    // static functions
        static function findById()
        {

        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM brands;");
        }

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
            $brands = array();
            foreach ($returned_brands as $brand) {
                $id = $brand['id'];
                $name = $brand['name'];
                array_push($brands, new Brand($name, $id));
            }
            return $brands;
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
