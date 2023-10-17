<?php

namespace App\Models;

use AppModels\Base\Products as BaseProducts;
use AppModels\Base\ProductsQuery;
use Exception;

class Products extends BaseProducts
{
    // product_name, product_code, price
    public function index(){
        $products = ProductsQuery::create()->find();
        $productssArray = array();
        $incr = 0;
        foreach($products as $product) {
            $productsArray[$incr] = array( 
                "id" => $product->getId(), 
                "product_name" => $product->getProductName(), 
                "product_code" => $product->getProductCode(), 
                "price" => $product->getPrice()
            );
            $incr += 1;
        }
        return $productsArray;
    }

    public function show($id){
        
    }

    public function new($params){
        $product = new Products();
        $product->setProductName($params->product_name);
        $product->setProductCode($params->product_code);
        $product->setPrice($params->price);
        $product->save();
    }

    public function update($params){
        $product = ProductsQuery::create()->findOneById($params->id);
        $product->setProductName($params->product_name);
        $product->setProductCode($params->product_code);
        $product->setPrice($params->price);
        $product->save();
    }

    public function destroy($id){
        try{
            $product = ProductsQuery::create()->findOneById($id);
            $product->delete();
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => "error deleting product"));
            exit;
        }
    }
}

?>