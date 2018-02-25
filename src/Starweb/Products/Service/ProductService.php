<?php
namespace Starweb\Products\Service;

use Starweb\Products\Config\DBConfig;
use Starweb\Products\Util\LogHandler;
use Starweb\Products\DB\PDOSource;
use Starweb\Products\DB\PDOHandler;

/**
 * Handles the Products
 * 
 * @author paul
 *
 */
class ProductService {
    private $dataHandler;
    
    /**
     * Initialize the data handler
     */
    public function __construct() {
        $ds = new PDOSource(new LogHandler());
        $this->dataHandler = new PDOHandler($ds->connect(DBConfig::$host, DBConfig::$port, DBConfig::$db, DBConfig::$user, DBConfig::$pass), new LogHandler());
    }
    
    /**
     * Get all posts from Products 
     * 
     * @return Array Associative array with Products
     */
    public function getAll() {
        return $this->dataHandler->fetch(\Starweb\Products\Constant\READ_ALL);
    }
    
    /**
     * Create's a new Product
     * 
     * @param String $title
     * @param String $description
     * 
     * @return void
     */
    public function create($title, $description) { 
        $params = array("title" => $title, "description" => $description);
        $this->dataHandler->change(\Starweb\Products\Constant\CREATE, $params);      
    }
    
    /**
     * Update's a Product by id
     * 
     * @param String $id
     * @param String $title
     * @param String $description
     * 
     * @return void
     */
    public function update($id, $title, $description) {
        $params = array("id" => $id, "title" => $title, "description" => $description);
        $this->dataHandler->change(\Starweb\Products\Constant\UPDATE_BY_ID, $params);  
    }
}