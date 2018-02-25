<?php
namespace Starweb\Products\Util;

/**
 * Handles the log
 * 
 * @author paul
 *
 */
class LogHandler {
    
    public function errorLog($message) {
        \error_log("ERROR >> " . $message);
    }
}
