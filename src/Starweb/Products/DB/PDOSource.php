<?php
namespace Starweb\Products\DB;

/**
 * Establish's a DB connection
 * 
 * @author paul
 *
 */
class PDOSource {
    
    private $logHandler;
    
    /**
     * Initialize
     * 
     * @param LogHandler $logHandler
     */
    public function __construct($logHandler) {
        $this->logHandler = $logHandler;
    }
    
    /**
     * 
     * @param String $host
     * @param String $port
     * @param String $db
     * @param String $user
     * @param String $pass
     * 
     * @return PDO DB connection
     */
    public function connect($host, $port, $db, $user, $pass) {
        try{
            return new \PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
            
        } catch(\PDOException $e) {
            $this->logHandler->errorLog("PDOSource->connection: " . $e->getMessage());
        }
    }
}

