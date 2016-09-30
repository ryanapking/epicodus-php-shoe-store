<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    **/

    require_once 'src/Store.php';
    require_once 'src/Brand.php';

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Store::deleteAll();
            Brand::deleteAll();
            $GLOBALS['DB']->exec("DELETE FROM brands_stores;");
        }

        function test_getId()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $store_id = 3;
            $test_Store = new Store($store_name, $store_id);

            // Act
            $result = $test_Store->getId();

            // Assert
            $this->assertEquals($store_id, $result);
        }

        function test_getName()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $store_id = 3;
            $test_Store = new Store($store_name, $store_id);

            // Act
            $result = $test_Store->getName();

            // Assert
            $this->assertEquals($store_name, $result);
        }

        function test_setName()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $store_id = 3;
            $test_Store = new Store($store_name, $store_id);

            // Act
            $new_name = "Shoemageddon";
            $test_Store->setName($new_name);
            $result = $test_Store->getName();

            // Assert
            $this->assertEquals($new_name, $result);
        }

        function test_save()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $test_Store = new Store($store_name);

            // Act
            $test_Store->save();
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_Store], $result);
        }

        function test_getAll()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $test_Store = new Store($store_name);
            $test_Store->save();

            $store_name2 = "Shoemageddon";
            $test_Store2 = new Store($store_name2);
            $test_Store2->save();

            // Act
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_Store, $test_Store2], $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $test_Store = new Store($store_name);
            $test_Store->save();

            $store_name2 = "Shoemageddon";
            $test_Store2 = new Store($store_name2);
            $test_Store2->save();

            // Act
            Store::deleteAll();
            $result = Store::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_delete()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $test_Store = new Store($store_name);
            $test_Store->save();

            $store_name2 = "Shoemageddon";
            $test_Store2 = new Store($store_name2);
            $test_Store2->save();

            // Act
            $test_Store->delete();
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_Store2], $result);
        }

        function test_update()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $test_Store = new Store($store_name);
            $test_Store->save();

            // Act
            $new_name = "Shoemageddon";
            $test_Store->setName($new_name);
            $test_Store->update();
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_Store], $result);
        }

        function test_findById()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $test_Store = new Store($store_name);
            $test_Store->save();

            $store_name2 = "Shoemageddon";
            $test_Store2 = new Store($store_name2);
            $test_Store2->save();

            // Act
            $search_id = $test_Store->getId();
            $result = Store::findById($search_id);

            // Assert
            $this->assertEquals($test_Store, $result);
        }

        function test_addBrand()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $test_Store = new Store($store_name);
            $test_Store->save();

            $brand_name = "Wear Us!";
            $test_Brand = new Brand($brand_name);
            $test_Brand->save();

            // Act
            $test_Store->addBrand($test_Brand);
            $result = $test_Store->getBrandList();

            // Assert
            $this->assertEquals([$test_Brand], $result);
        }

        function test_deleteBrand()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $test_Store = new Store($store_name);
            $test_Store->save();

            $brand_name = "Wear Us!";
            $test_Brand = new Brand($brand_name);
            $test_Brand->save();

            $test_Store->addBrand($test_Brand);

            // Act
            $test_Store->deleteBrand($test_Brand);
            $result = $test_Store->getBrandList();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_getBrandList()
        {
            // Arrange
            $store_name = "Shoepocalypse";
            $test_Store = new Store($store_name);
            $test_Store->save();

            $brand_name = "Wear Us!";
            $test_Brand = new Brand($brand_name);
            $test_Brand->save();

            $brand_name2 = "On Your Feet";
            $test_Brand2 = new Brand($brand_name2);
            $test_Brand2->save();

            $test_Store->addBrand($test_Brand);
            $test_Store->addBrand($test_Brand2);

            // Act
            $result = $test_Store->getBrandList();

            // Assert
            $this->assertEquals([$test_Brand, $test_Brand2], $result);
        }
    }
 ?>
