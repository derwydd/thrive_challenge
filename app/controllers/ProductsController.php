<?php

namespace App\Controllers;

use App\Controller;
use Lib\ControllerCRUD as CC;
use App\Models\Products as Model;

class ProductsController extends Controller {
    private $obj_name = 'Product';
    public function index() {
        $cc = new CC();
        $cc->index(new Model(), $this->obj_name);
    }

    public function show($params){
        //  Not working yet
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
}

?>