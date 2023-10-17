<?php

namespace App\Models;

use AppModels\Base\Users as BaseUsers;
use AppModels\Base\UsersQuery;
use Exception;

class Users extends BaseUsers
{
    public function index(){
        $users = UsersQuery::create()->find();
        $usersArray = array();
        $incr = 0;
        foreach($users as $user) {
            $usersArray[$incr] = array( 
                "id" => $user->getId(), 
                "first_name" => $user->getFirstName(), 
                "last_name" => $user->getLastName(), 
                "username" => $user->getUserName()
            );
            $incr += 1;
        }
        return $usersArray;
    }

    public function show($id){
        $users = UsersQuery::create()->findOneById($id);
        $usersArray = array();
        $incr = 0;
        foreach($users as $user) {
            $usersArray[$incr] = array( 
                "id" => $user->getId(), 
                "first_name" => $user->getFirstName(), 
                "last_name" => $user->getLastName(), 
                "username" => $user->getUserName()
            );
            $incr += 1;
        }
        return $usersArray;
    }

    public function new($params){
        $user = new Users();
        $user->setFirstName($params->first_name);
        $user->setLastName($params->last_name);
        $user->setUserName($params->username);
        $user->setPassword($params->password);
        $user->save();
    }

    public function update($params){
        $user = UsersQuery::create()->findOneById($params->id);
        $user->setFirstName($params->first_name);
        $user->setLastName($params->last_name);
        $user->setUserName($params->username);
        $user->setPassword($params->password);
        $user->save();
    }

    public function destroy($id){
        try{
            $user = UsersQuery::create()->findOneById($id);
            $user->delete();
        }catch(Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => "error deleting user"));
            exit;
        }
    }
}

?>