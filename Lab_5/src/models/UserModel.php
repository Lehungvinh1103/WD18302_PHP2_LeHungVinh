<?php

namespace App\models;
// use App\models\BaseModel;

class UserModel extends BaseModel{
    
    private $_table = 'users';

    function tableFill()
    {
        return 'users';
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'id';
    }

    public function getAllUser(){
        return $this->getAll();
    }

    public function checkUser($email){
        $data = $this->select('*')->table($this->_table)->where('email', '=', $email)->first();
        // $data = $this->query("SELECT * FROM users where email = '$email'");
        return $data;
    }

}