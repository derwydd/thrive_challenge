<?php

namespace Lib;
use Exception;

class ControllerCRUD {

    public function index($Model, $obj_name){
        try{
            $obj = new $Model();
            http_response_code(200);
            echo json_encode($obj->index());
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => $e));
        }
    }

    public function new($params, $Model, $obj_name){
        try{
            $obj = new $Model();
            $obj->new($params);
            http_response_code(200);
            echo json_encode(array("message" => $obj_name . " created"));
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => $e."errorB"));
        }
    }

    public function show($id, $Model, $obj_name){
        //Not Working yet
        // try{
        //     $obj = new $Model();
        //     http_response_code(200);
        //     echo json_encode($obj->show($id));
        // }catch(Exception $e){
        //     http_response_code(400);
        //     echo json_encode(array("message" => $e));
        // }
    }

    public function update($params, $Model, $obj_name){
        try{
            $obj = new $Model();
            $obj->update($params);
            http_response_code(200);
            echo json_encode(array("message" => $obj_name . " updated"));
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => $e));
        }
    }

    public function destroy($id, $Model, $obj_name){
        try{
            $obj = new $Model();
            $obj->destroy($id);
            http_response_code(200);
            echo json_encode(array("message" => $obj_name ." deleted"));
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => $e));
        }
    }

}