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
        // protected function tearDown()
        // {
        //     Store::deleteAll();
        //     Brand::deleteAll();
        // }

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
    }
 ?>
