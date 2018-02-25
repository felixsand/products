<?php
namespace Starweb\Products\View;

/**
 * Create the end of the Product page HTML document
 * 
 * @author paul
 *
 */
class ProductPageEnd {
    
    public function create() {
        $out = <<<_TXT
            </body>
            </html>
_TXT;
        
        return $out;
    }
}

