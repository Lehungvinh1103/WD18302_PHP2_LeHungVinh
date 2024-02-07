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
        return 'user_id';
    }

    public function getAllUser(){
        return $this->getAll();
    }

    public function checkUserEmail($email){
        $data = $this->select('*')->table($this->_table)->where('email', '=', $email)->first();
        // $data = $this->query("SELECT * FROM users where email = '$email'");
        return $data;
    }

    public function checkUsername($username){
        $data = $this->select('*')->table($this->_table)->where('username', '=', $username)->first();
        return $data;
    }


    public function addUser($dataUser){
        $data = $this->table($this->_table)->insert($dataUser);
        return $data;
    }

    public function test($id){
        
        return $this->table($this->_table)->getOne($id);
    }

}