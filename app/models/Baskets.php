<?php

namespace App\Models;

use AppModels\Base\Baskets as BaseBaskets;
use AppModels\Base\BasketsQuery;
use AppModels\Base\ProductsQuery;
use AppModels\Base\SpecialOffersQuery;
use AppModels\Base\DeliveryCostsQuery;
use Exception;

class Baskets extends BaseBaskets
{
    // id, user_id, product_code
    public function index(){
        $baskets = BasketsQuery::create()->find();
        $basketsArray = array();
        $incr = 0;
        foreach($baskets as $basket) {
            $basketsArray[$incr] = array( 
                "id" => $basket->getId(), 
                "user_id" => $basket->getUserId(), 
                "product_code" => $basket->getProductCode()
            );
            $incr += 1;
        }
        return $basketsArray;
    }

    public function show($id){
     
    }

    public function new($params){
        $obj = new Baskets();
        $obj->setUserId($params->user_id);
        $obj->setProductCode($params->product_code);
        $obj->save();
    }

    public function update($params){
        $basket = BasketsQuery::create()->findOneById($params->id);
        $basket->setUserId($params->user_id);
        $basket->setProductCode($params->product_code);
        $basket->save();
    }

    public function destroy($id){
        try{
            $basket = BasketsQuery::create()->findOneById($id);
            $basket->delete();
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => "error deleting basket"));
            exit;
        }
    }

    public function total($id){
        // get all basket items by user_id
        $baskets = BasketsQuery::create()->findByUserId($id);
        $basketsArray = array();
        $subTotal = 0;
        $total = 0;
        $deliveryCost = 4.95;
        $redWidgetCount = 0;
        $redCost = 0;


        foreach($baskets as $basket) {
            $products = ProductsQuery::create()->find();
            foreach($products as $product) {
                if ($product->getProductCode() == $basket->getProductCode()){
                    // determine subtotal
                    $subTotal += $product->getPrice();
                }
                if ($product->getProductCode() == "R01"){
                    $redCost = $product->getPrice();
                }
            }

            // Special Offers - Keep track of quantity of R01 product
            if ($basket->getProductCode() == 'R01'){
                $redWidgetCount += 1;
            }
        }

        // apply special offers
        if ($redWidgetCount > 1){
            $subTotal = $subTotal - ($redCost / 2);
        }

        // logic for delivery costs
        $delivery_costs = DeliveryCostsQuery::create()->find();
        foreach($delivery_costs as $cost) {
            if ($cost->getOperator() == "<"){
                if ($subTotal < $cost->getThreshold() ){
                    $deliveryCost = $cost->getCost();
                    break;
                }
            }else if($cost->getOperator() == ">="){
                if ($subTotal >= $cost->getThreshold()){
                    $deliveryCost = $cost->getCost();
                }
            }
        }

        $total = $subTotal + $deliveryCost;
        // return total cost
        return number_format($total, 2);
    }


}
