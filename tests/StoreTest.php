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
            // Brand::deleteAll();
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

        
    }
 ?>
