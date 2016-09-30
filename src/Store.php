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
            $returned_brand_ids = $GLOBALS['DB']->query("SELECT brands_stores.brand_id FROM stores JOIN brands_stores ON (stores.id = brands_stores.store_id) WHERE stores.id = {$this->id};");
            $brands = array();
            foreach($returned_brand_ids as $id) {
                $search_id = $id['brand_id'];
                array_push($brands, Brand::findById($search_id));
            }
            return $brands;
        }

        function addBrand($brand)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (brand_id, store_id) VALUES ({$brand->getId()}, {$this->id});");
        }

        function deleteBrand($brand)
        {
            $GLOBALS['DB']->exec("DELETE FROM brands_stores WHERE brand_id = {$brand->getId()} AND store_id = {$this->id};");
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
