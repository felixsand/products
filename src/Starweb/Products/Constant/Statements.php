<?php
namespace Starweb\Products\Constant;

const READ_ALL = "SELECT * FROM products";
const READ_BY_ID = "SELECT * FROM products WHERE id=:id";
const CREATE = "INSERT INTO products (title, description) VALUES (:title, :description)";
const UPDATE_BY_ID = "UPDATE products SET title=:title, description=:description WHERE id=:id";