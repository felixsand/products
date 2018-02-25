<?php
namespace Starweb\Products\View;

/**
 * Create's a list all Products view
 *
 * @author paul
 *
 */
class ProductListAll {
    
    public function create($products) {
        $out = '<div id="heading">';
        $out .= "<h3>Listan</h3>";
        $out .= '<a href="/add">L&auml;gg till</a>';
        $out .= "</div>";
        
        $out .= '<div id="list_box">';
        $out .= "<ul>";
        
        foreach ($products as $p) {
            $id = $p["id"];
            $title = $p["title"];
            $description = $p["description"];
            
            $out .= <<<_TXT
                <li>
                <form method="post" action="/update">
                <input type="hidden" name="id" value="$id" />
                <input type="text" name="title" value="$title" />
                <textarea name="description">$description</textarea>
                <input type="submit" value="&Auml;ndra" />
                </form>
                </li>
_TXT;
        }
        
        $out .= "</ul>";
        $out .= "</div>";
        
        return $out;
    }
}