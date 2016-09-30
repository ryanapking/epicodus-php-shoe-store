# _Shoes

#### _App that uses a database to track shoe stores and shoe brands. 9/30/2016_

#### By _**Ryan Apking**_

## Description

_An application for tracking shoe stores and the brands they sold in them. User can select a store to see which brands they sell, and can select a brand to see which store sells their shoes._

## Specifications

_Spec 1: The store ID can be returned._
* _Input: Get "Shoepocalypse" ID_
* _Output: 34_

_Spec 2: The store name can be returned._
* _Input: Get store name_
* _Output: "Shoemageddon"_

_Spec 3: The store name can be changed._
* _Input: Change "Shoemageddon" to "Shoepocalypse"_
* _Output: Store name now set to "Shoepocalypse"_

_Spec 4: Store objects can be saved to the database_
* _Input: Save store "Shoemageddon"_
* _Output: Database stores table now includes "Shoemageddon" with a unique ID_

_Spec 5: The entire list of stores can be deleted from the database._
* _Input: Delete all stores_
* _Output: Database stores table is now empty_

_Spec 6: A list of all stores can be retrieved from the database._
* _Input: Get all stores_
* _Output: "Shoepocalypse", "Shoemageddon"_

_Spec 7: Individual store objects can be deleted from the database_
* _Input: Delete store "Shoemageddon"_
* _Output: Database stores table no longer includes "Shoemageddon"_

_Spec 8: Store objects can be updated in the database_
* _Input 1: Change name of "Shoemageddon" to "Shoepocalypse"_
* _Input 2: Update "Shoemageddon"_
* _Output: Database stores table now shows the name of "Shoepocalypse"_

_Spec 9: A store can be found by the database ID number._
* _Input: Find Shoe store with ID 47_
* _Output: "Shoepocalypse"_

_Spec 10: A brand of shoes can be added to a store._
* _Input: "Shoepocalypse" now sells "Nike" shoes_
* _Output: Database brands_stores table now includes an entry linking "Shoepocalypse" with the "Nike" brand_

_Spec 11: A brand of shoes can be deleted from a store._
* _Input: "Shoepocalypse" no longer sells "Nike" shoes_
* _Output: Database brands_stores table no longer includes an entry linking "Shoepocalypse" with the "Nike" brand_

_Spec 12: A list of all brands sold in a store can be returned._
* _Input: Get all shoe brands sold at "Shoepocalypse"_
* _Output: "Nike", "Crocs"_

_Spec 13: The brand ID can be returned._
* _Input: Get "Wear Us!" ID_
* _Output: 23_

_Spec 14: The brand name can be returned._
* _Input: Get brand name_
* _Output: "Wear Us!"_

_Spec 15: The brand name can be changed._
* _Input: Change "Wear Us!" to "On Your Feet"_
* _Output: Brand name now set to "On Your Feet"_

_Spec 16: Brand objects can be saved to the database_
* _Input: Save brand "Wear Us!"_
* _Output: Database brands table now includes "Wear Us!" with a unique ID_

_Spec 17: The entire list of brands can be deleted from the database._
* _Input: Delete all brands_
* _Output: Database brands table is now empty_

_Spec 18: A list of all brands can be retrieved from the database._
* _Input: Get all brands_
* _Output: "On Your Feet", "Wear Us!"_

_Spec 20: Individual brand objects can be deleted from the database_
* _Input: Delete brand "Wear Us!"_
* _Output: Database brands table no longer includes "Wear Us!"_

_Spec 21: Store objects can be updated in the database_
* _Input 1: Change name of "Wear Us!" to "On Your Feet"_
* _Input 2: Update "Wear Us!"_
* _Output: Database brands table now shows the name of "On Your Feet"_

_Spec 22: A brand can be found by the database ID number._
* _Input: Find Shoe brand with ID 47_
* _Output: "On Your Feet"_




##  MySQL Database Setup

_Commands used to set up database:_

* _CREATE DATABASE shoes;_
* _USE shoes;_
* _CREATE TABLE brands (id serial PRIMARY KEY, name VARCHAR (255));_
* _CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR (255));_
* _CREATE TABLE brands_stores (id serial PRIMARY KEY, brand_id INT, store_id INT);_

_Use phpMyAdmin to create a copy of the database called shoes_test._


## Setup/Installation Requirements

_Dependencies: Silex, Twig, PHPUnit_

* _Clone repository from github_
* _While in the project directory, run 'composer install' in the terminal._
* _Import the databased hair_salon and hair_salon_test through your apache server._
* _Start a local server with the web directory as the root._
* _Navigate to localhost in browser window._

## Known Bugs

_None_

## Support and contact details

_Contact me via email with any issues_

## Technologies Used

_HTML, PHP, Silex, Twig_

### License

*This program is licensed under the MIT license.*

Copyright (c) 2016 **_Ryan Apking_**
