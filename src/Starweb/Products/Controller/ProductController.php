<?php
namespace Starweb\Products\Controller;

use Starweb\Products\Service\ProductService;
use Starweb\Products\View\ProductPageStart;
use Starweb\Products\View\ProductPageEnd;
use Starweb\Products\View\ProductListAll;
use Starweb\Products\View\ProductCreate;

/**
 * Handles the Request's
 * 
 * @author paul
 *
 */
class ProductController {
    
    private $productService;
    private $pageStart;
    private $pageEnd;
    
    /**
     * Initialize
     */
    public function __construct() {
        $this->productService = new ProductService();
        $this->pageStart = $this->pageStart();
        $this->pageEnd = $this->pageEnd();
    }
    
    /**
     * Conducting the Request's
     */
    public function init() {
        if (isset($_SERVER["PATH_INFO"])) {
            switch ($_SERVER["PATH_INFO"]) {
                
                case "/list":
                    $this->pageListAll();
                    break;
                    
                case "/add":
                    $this->pageCreate();
                    break;
                    
                case "/create":
                    $this->create();
                    break;
                    
                case "/update":
                    $this->update();
                    break;
                    
                default:
                    $this->pageListAll();
            }
            
        } else {
            $this->pageListAll();
        }    
    }
    
    /**
     * Print's a list of all Products page 
     */
    private function pageListAll() {
        $productListAll = new ProductListAll();     
        $out = $this->pageStart . $productListAll->create($this->productService->getAll()) . $this->pageEnd;     
        print($out);
    }
    
    /**
     * Print's a create new Product page
     */
    private function pageCreate() {
        $productCreate = new ProductCreate();       
        $out = $this->pageStart . $productCreate->create() . $this->pageEnd;
        print($out);
    }
    
    /**
     * Create a new Product and then view all Products page
     */
    private function create() {
        $this->productService->create($_POST["title"], $_POST["description"]);
        \header("Location: /list");
    }
    
    /**
     * Update a Product and then view all Products page
     */
    private function update() {
        $this->productService->update($_POST["id"], $_POST["title"], $_POST["description"]);       
        \header("Location: /list");
    }
    
    /**
     * Returns the start of the Product page HTML document
     * 
     * @return String
     */
    private function pageStart() {
        $p = new ProductPageStart();
        return $p->create();
    }
    
    /**
     * Returns the end of the Product page HTML document
     * 
     * @return String
     */
    private function pageEnd() {
        $p = new ProductPageEnd();
        return $p->create();
    }  
}

