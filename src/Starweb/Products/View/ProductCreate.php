<?php
namespace Starweb\Products\View;

/**
 * Create's a create new Product view
 * 
 * @author paul
 *
 */
class ProductCreate {
    
    public function create() {
        $out = <<<_TXT
            <div id="heading">
            <h3>L&auml;gg till</h3>
            </div>

            <div id="add_box">
            <form method="post" action="/create">
            <input type="text" name="title" value="" />
            <textarea name="description"></textarea>
            <input type="submit" value="Spara" />
            </form>
            </div>
_TXT;
        
        return $out;
    }
}

