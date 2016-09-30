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
            $GLOBALS['DB']->exec("DELETE FROM brands WHERE id = {$this->id};");
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE brands SET name = '{$this->name}' WHERE id = {$this->id};");
        }

        function getStoreList()
        {
            $returned_store_ids = $GLOBALS['DB']->query("SELECT brands_stores.store_id FROM brands JOIN brands_stores WHERE (brands.id = brands_stores.brand_id);");
            $stores = array();
            foreach($returned_store_ids as $id) {
                $search_id = $id['store_id'];
                var_dump($search_id);
                array_push($stores, Store::findById($search_id));
            }
            return $stores;
        }

    // static functions
        static function findById($search_id)
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands WHERE id = {$search_id};");
            foreach($returned_brands as $brand) {
                $id = $brand['id'];
                $name = $brand['name'];
                return new Brand($name, $id);
            }
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
