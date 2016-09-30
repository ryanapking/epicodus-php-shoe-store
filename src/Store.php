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
            $GLOBALS['DB']->exec("INSERT INTO stores (name) VALUES ('{$this->name}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->id};");
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE stores SET name = '{$this->name}' WHERE id = {$this->id};");
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
        static function findById($search_id)
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores WHERE id = {$search_id};");
            foreach ($returned_stores as $store) {
                $id = $store['id'];
                $name = $store['name'];
                return new Store($name, $id);
            }
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores;");
        }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
            $stores = array();
            foreach($returned_stores as $store) {
                $id = $store['id'];
                $name = $store['name'];
                array_push($stores, new Store($name, $id));
            }
            return $stores;
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
