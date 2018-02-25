<?php
namespace Starweb\Products\DB;

/**
 * Handles the communication with a database based on PDO
 * 
 * @author paul
 *
 */
class PDOHandler {
    
    private $dbConn;
    private $logHandler;
    
    /**
     * Initialize
     * 
     * @param PDOSource $dbCon DB connection
     * @param LogHandler $logHandler
     */
    public function __construct($dbCon, $logHandler) {
        $this->dbConn = $dbCon;
        $this->logHandler = $logHandler;
    }
    
    /**
     * Fetch posts
     * Should be used without a WHERE clause.
     * 
     * @param String $statement SELECT clause
     * 
     * @return Array Associative array
     */
    public function fetch($statement) {
        try{
            $stmt = $this->dbConn->query($statement);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch(\PDOException $e) {
            $this->logHandler->errorLog("PDOHandler->fetch: " . $e->getMessage());
        }
    }
    
    /**
     * Fetch posts by 
     *
     * @param String $statement SELECT clause including WHERE
     * @param Array $params Prepared key/value
     *
     * @return Array Associative array
     */
    public function fetchBy($statement, $params) {
        try{
            $stmt = $this->dbConn->prepare($statement);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch(\PDOException $e) {
            $this->logHandler->errorLog("PDOHandler->fetchBy: " . $e->getMessage());
        }
    }
    
    /**
     * Change posts
     *
     * @param String $statement INSERT/UPDATE/DELETE clause including named params
     * @param Array $params Prepared key/value
     *
     * @return int Number of affected rows
     */
    public function change($statement, $params) {
        try{
            $stmt = $this->dbConn->prepare($statement);
            $stmt->execute($params);
            return $stmt->rowCount();
            
        } catch(\PDOException $e) {
            $this->logHandler->errorLog("PDOHandler->change: " . $e->getMessage());
        }   
    }
}