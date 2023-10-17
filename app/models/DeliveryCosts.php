<?php

namespace App\Models;

use AppModels\Base\DeliveryCosts as BaseDeliveryCosts;
use AppModels\Base\DeliveryCostsQuery;
use Exception;

class DeliveryCosts extends BaseDeliveryCosts
{
    // id, delivery_type, cost
    public function index(){
        $costs = DeliveryCostsQuery::create()->find();
        $costsArray = array();
        $incr = 0;
        foreach($costs as $cost) {
            $costsArray[$incr] = array( 
                "id" => $cost->getId(), 
                "delivery_name" => $cost->getDeliveryName(), 
                "operator" => $cost->getOperator(),
                "threshold" => $cost->getThreshold(),
                "cost" => $cost->getCost()
            );
            $incr += 1;
        }
        return $costsArray;
    }

    public function show($id){
       
    }

    public function new($params){
        $cost = new DeliveryCosts();
        $cost->setDeliveryName($params->delivery_name);
        $cost->setOperator($params->operator);
        $cost->setThreshold($params->threshold);
        $cost->setCost($params->cost);
        $cost->save();
    }

    public function update($params){
        $cost = DeliveryCostsQuery::create()->findOneById($params->id);
        $cost->setDeliveryName($params->delivery_name);
        $cost->setOperator($params->operator);
        $cost->setThreshold($params->threshold);
        $cost->setCost($params->cost);
        $cost->save();
    }

    public function destroy($id){
        try{
            $cost = DeliveryCostsQuery::create()->findOneById($id);
            $cost->delete();
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => "error deleting delivery cost"));
            exit;
        }
    }
}

?>