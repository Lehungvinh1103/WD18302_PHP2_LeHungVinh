<?php
namespace App\core;


class Validator {
    private $data;
    private $errors = [];

    public function __construct($data) {
        $this->data = $data;
    }

    public function validateRequired($field, $message = null) {
        if (empty($this->data[$field])) {
            $this->addError($field, $message ?: ucfirst($field) . ' Không được để trống.');
        }

        if($this->data[$field] === false) {
            $this->addError($field, $message ?: ucfirst($field) . ' Không được để trống.');
        }
    }

    public function validateEmail($field, $message = null) {
        if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->addError($field, $message ?: ' không đúng định dạng.');
        }

        if($this->data[$field] === false) {
            $this->addError($field, $message ?: ucfirst($field) . ' không đúng định dạng.');
        }
    }

    public function validatePassword($field, $message = null) {
        $password = $this->data[$field];

        // Password 6 ky tu
        if (strlen($password) < 6) {
            $this->addError($field, $message ?: ucfirst($field) . ' phải chứa ít nhất 6 ký tự.');
        }

        // ky tu dat biet
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $this->addError($field, $message ?: ucfirst($field) . ' phải chứa ít nhất một ký tự đặc biệt.');
        }

    }

    public function validateConfirmedPassword($field, $confirmationField, $message = null) {
        $password = $this->data[$field];
        $confirmation = $this->data[$confirmationField];

        // Check pass
        if ($password !== $confirmation) {
            $this->addError($field, $message ?: ucfirst($field) . ' không khớp với xác nhận mật khẩu.');
        }
    }


    public function passes() {
        return empty($this->errors);
    }

    public function fails() {
        return !$this->passes();
    }

    public function getErrors() {
        return $this->errors;
    }

    private function addError($field, $message) {
        $this->errors[$field] = $message;
    }
}
