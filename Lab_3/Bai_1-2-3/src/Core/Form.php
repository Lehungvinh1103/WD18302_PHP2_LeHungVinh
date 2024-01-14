<?php

namespace App\Core;

class Form
{
    private $formFields = [];

    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s" class="w-50 m-auto">', $action, $method);
        return new Form();
    }

    public static function end(){
        return '</form>';
    }

    public function field($attribute){
        $field = new Field($attribute);
        $this->formFields[] = $field;
        return $field;
    }

    public function __toString() {
        $output = "";
        foreach ($this->formFields as $field) {
            $output .= $field . "<br>";
        }
        return $output;
    }
}
?>
