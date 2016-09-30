<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Brand.php';
    require_once __DIR__.'/../src/Store.php';

    $server = 'mysql:host=localhost;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

// home
    $app->get('/', function() use ($app) {
        return $app['twig']->render('home.html.twig');
    });

// stores routes
    $app->get('/stores', function() use ($app) {
        // displays a list of all stores and a form allowing for a new store to be entered
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    $app->post('/stores', function() use ($app) {
        // adds the new store to the database and redirects to stores get route
        $store_name = $_POST['store_name'];
        $new_store = new Store($store_name);
        $new_store->save();
        return $app->redirect('/stores');
    });

// store (singular) routes
    $app->get('/store/{store_id}', function($store_id) use ($app) {
        // displays all brands sold in a specific store and a form allowing for a brand to be added to the store
        $store = Store::findById($store_id);
        $store_brands = $store->getBrandList();
        $all_brands = Brand::getAll();
        return $app['twig']->render('store.html.twig', array('store' => $store, 'store_brands' => $store_brands, 'all_brands' => $all_brands));
    });

    $app->post('/store/{store_id}', function($store_id) use ($app) {
        // adds the brand to the store, then redirects to the get route
        $store = Store::findById($store_id);
        $brand_id = $_POST['brand_id'];
        $brand = Brand::findById($brand_id);
        $store->addBrand($brand);
        return $app->redirect('/store/' . $store_id);
    });

    $app->patch('/store/{store_id}', function($store_id) use ($app) {
        // updates the store information, then redirects to the get route
        $store = Store::findById($store_id);
        $new_name = $_POST['store_name'];
        $store->setName($new_name);
        $store->update();
        return $app->redirect('/store/' . $store_id);
    });

    $app->delete('/store/{store_id}', function($store_id) use ($app) {
        // deletes the store from the database, then redirects to the stores page
        $store = Store::findById($store_id);
        $store->delete();
        return $app->redirect('/stores');
    });

// brands routes
    $app->get('/brands', function() use ($app) {
        // displays a list of all available brands and a form to add new brands
        return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    $app->post('/brands', function() use ($app) {
        // adds a new brand to the database, then redirects to the get route
        $brand_name = $_POST['brand_name'];
        $new_brand = new Brand($brand_name);
        $new_brand->save();
        return $app->redirect('/brands');
    });

// brand (singular) routes
    $app->get('/brand/{brand_id}', function($brand_id) use ($app) {
        // displays a list of stores selling the current brand
        $brand = Brand::findById($brand_id);
        $brand_stores = $brand->getStoreList();
        return $app['twig']->render('brand.html.twig', array('brand' => $brand, 'brand_stores' => $brand_stores, 'all_stores' => Store::getAll()));
    });

    $app->post('/brand/{brand_id}', function($brand_id) use ($app) {
        // adds the brand to a store, then redirects to the get route
        $brand = Brand::findById($brand_id);
        $store_id = $_POST['store_id'];
        $store = Store::findById($store_id);
        $store->addBrand($brand);
        return $app->redirect('/brand/' . $brand_id);
    });

    $app->delete('/brand/{brand_id}', function($brand_id) use ($app) {
        // deletes the current brands, then redirects to the brands route
        $brand = Brand::findById($brand_id);
        $brand->delete();
        return $app->redirect('/brands');
    });

    $app->patch('/brand/{brand_id}', function($brand_id) use ($app) {
        // updates the current brand, then redirects to the get route
        $brand = Brand::findById($brand_id);
        $new_name = $_POST['brand_name'];
        $brand->setName($new_name);
        $brand->update();
        return $app->redirect('/brand/' . $brand_id);
    });

    return $app;
 ?>
