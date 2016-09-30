# _Shoes

#### _App that uses a database to track shoe stores and shoe brands. 9/30/2016_

#### By _**Ryan Apking**_

## Description

_An application for tracking shoe stores and the brands they sold in them. User can select a store to see which brands they sell, and can select a brand to see which store sells their shoes._

## Specifications

_Spec 1: Stylists can be saved to the database._
* _Input: Save new Stylist "Rebecca"_
* _Output: Database stylists table now includes "Rebecca" with a unique ID_



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
