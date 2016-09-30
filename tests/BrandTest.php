<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
**/

require_once 'src/Brand.php';
require_once 'src/Store.php';

$server = 'mysql:host=localhost;dbname=shoes_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class BrandTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        // Store::deleteAll();
        Brand::deleteAll();
    }

    function test_getId()
    {
        // Arrange
        $brand_name = "Wear Us!";
        $brand_id = 23;
        $test_Brand = new Brand($brand_name, $brand_id);

        // Act
        $result = $test_Brand->getId();

        // Assert
        $this->assertEquals($brand_id, $result);
    }

    function test_getName()
    {
        // Arrange
        $brand_name = "Wear Us!";
        $brand_id = 23;
        $test_Brand = new Brand($brand_name, $brand_id);

        // Act
        $result = $test_Brand->getName();

        // Assert
        $this->assertEquals($brand_name, $result);
    }

    function test_setName()
    {
        // Arrange
        $brand_name = "Wear Us!";
        $brand_id = 23;
        $test_Brand = new Brand($brand_name, $brand_id);

        // Act
        $new_name = "On Your Feet";
        $test_Brand->setName($new_name);
        $result = $test_Brand->getName();

        // Assert
        $this->assertEquals($new_name, $result);
    }

    function test_save()
    {
        // Arrange
        $brand_name = "Wear Us!";
        $test_Brand = new Brand($brand_name);

        // Act
        $test_Brand->save();
        $result = Brand::getAll();

        // Assert
        $this->assertEquals([$test_Brand], $result);
    }

    function test_deleteAll()
    {
        // Arrange
        $brand_name = "Wear Us!";
        $test_Brand = new Brand($brand_name);
        $test_Brand->save();

        $brand_name2 = "On Your Feet";
        $test_Brand2 = new Brand($brand_name2);
        $test_Brand2->save();

        // Act
        Brand::deleteAll();
        $result = Brand::getAll();

        // Assert
        $this->assertEquals([], $result);
    }

    function test_getAll()
    {
        // Arrange
        $brand_name = "Wear Us!";
        $test_Brand = new Brand($brand_name);
        $test_Brand->save();

        $brand_name2 = "On Your Feet";
        $test_Brand2 = new Brand($brand_name2);
        $test_Brand2->save();

        // Act
        $result = Brand::getAll();

        // Assert
        $this->assertEquals([$test_Brand, $test_Brand2], $result);
    }
}
 ?>
