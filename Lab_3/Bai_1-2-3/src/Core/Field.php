<?php

namespace App\Core;

class Field
{
    const TYPE_TEXT = "Text";
    const TYPE_PASSWORD = "Password";
    const TYPE_NUMBER = "Number";

    public string $type;
    public string $attribute;

    public function __construct(string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->attribute = $attribute;

    }

    public function __toString()
    {
        return sprintf(
            '
            <div class="form-group mb-3">
                <label for="" class="form-label">%s</label>
                <input class="form-control" type="%s" name="%s">
            </div>    
        ',
            $this->getLabel($this->attribute),
            $this->type,
            $this->attribute,
        );

    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
        
    }

    public function labels()
    {
        return [
            'firstname' => 'Nhập tên (*):',
            'lastname' => 'Nhập họ (*):',
            'email' => 'Nhập email (*):',
            'password' => 'Nhập mật khẩu (*):',
            'confirmPass' => 'Nhập lại mật khẩu (*):',
        ];

    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute] ?? $attribute;

    }
}
