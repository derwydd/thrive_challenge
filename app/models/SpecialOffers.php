<?php

namespace App\Models;

use AppModels\Base\SpecialOffers as BaseSpecialOffers;
use AppModels\Base\SpecialOffersQuery;
use Exception;

class SpecialOffers extends BaseSpecialOffers
{
    // offer_name, offer_code
    public function index(){
        $offers = SpecialOffersQuery::create()->find();
        $offersArray = array();
        $incr = 0;
        foreach($offers as $offer) {
            $offersArray[$incr] = array( 
                "id" => $offer->getId(), 
                "offer_name" => $offer->getOfferName(), 
                "offer_code" => $offer->getOfferCode(), 
            );
            $incr += 1;
        }
        return $offersArray;
    }

    public function show($id){
        
    }

    public function new($params){
        $offer = new SpecialOffers();
        $offer->setOfferName($params->offer_name);
        $offer->setOfferCode($params->offer_code);
        $offer->save();
    }

    public function update($params){
        $offer = SpecialOffersQuery::create()->findOneById($params->id);
        $offer->setOfferName($params->offer_name);
        $offer->setOfferCode($params->offer_code);
        $offer->save();
    }

    public function destroy($id){
        try{
            $offer = SpecialOffersQuery::create()->findOneById($id);
            $offer->delete();
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => "error deleting product"));
            exit;
        }
    }
}

?>