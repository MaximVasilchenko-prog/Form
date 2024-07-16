<?php

class Validation
{
    public function validateEmail(?string $email) : bool
    {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email '$email' указан верно <br/>";
        return true;
    } else {
        echo "Email '$email' указан неверно <br/>";
        return false;
    }
    }
    public function validatePassword(?string $password) : bool
    {
        if (is_string($password) && strlen($password) > 6) {
            echo "Пароль указан верно <br/>" ;
            return true;
        } else {
            echo "Пароль указан неверно <br/>";
            return false;
        }
    }
}

class User extends Validation {
    public ?string $email = null;
    public ?string $password = null;

    public function validate() : bool
    {
        return $this->validateEmail($this->email) && $this->validatePassword($this->password);
    }
}

$user = new User();

if (isset($_POST['login'])) {
    $user->email = $_POST['login'];
}

if (isset($_POST['password'])) {
    $user->password = $_POST['password'];
}

if ($user->validate()) {
    $data = [
        $user->email,
        $user->password
    ];

$filename = 'data.csv';

$file = fopen($filename, 'w');

if($file !== false) {
    fputcsv($file, $data);
}

fclose($file);
}

