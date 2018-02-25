<?php
namespace Starweb\Products\View;

/**
 * Create the start of the Product page HTML document
 * 
 * @author paul
 *
 */
class ProductPageStart {
    
    public function create() {
        $out = <<<_TXT
            <!DOCTYPE HTML>            
            <html>
            <head>
            <meta charset="UTF-8">
            <title>Starweb products</title>
            <link rel='stylesheet' type='text/css' href='css/style.css'>
            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/script.js"></script>
            </head>
            <body>
_TXT;
        
        return $out;
    }
}

