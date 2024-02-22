<?php
namespace App\core;

class Request{

    public function getPath(){
        
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        if(!strpos($path, '?')){
            return $path;
        }
        return substr($path, 0,strpos($path, '?'));
    }

    public function getBody()
    {
        $body = [];
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}