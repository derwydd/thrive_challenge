<?php

namespace App\Controllers;

use App\Controller;
use Lib\ControllerCRUD as CC;
use App\Models\Baskets as Model; 
use Exception;

class BasketsController extends Controller {
    private $obj_name = 'Basket';
    public function index() {
        $cc = new CC();
        $cc->index(new Model(), $this->obj_name);
    }

    public function show($params){
        $cc = new CC();
        $cc->show($params->id, new Model(), $this->obj_name);
    }

    public function new($params){
        $cc = new CC();
        $cc->new($params, new Model(), $this->obj_name); 
    }

    public function update($params){
        $cc = new CC();
        $cc->update($params, new Model(), $this->obj_name); 
    }

    public function destroy($params){
        $cc = new CC();
        $cc->destroy($params->id, new Model(), $this->obj_name); 
    }

    public function total($params){
        try{
            $model = new Model();
            $res = $model->total($params->user_id);
            http_response_code(200);
            echo json_encode(array("total_cost"=> $res));
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => $e));
        }
    }
}

?>