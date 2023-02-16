<?php
function debug($data) 
{
    echo '<pre>' . print_r($data, return: 1) . '<pre>';
}

function renderTemplate($__view, $__data)
{
    extract($__data);
    ob_start();

    require $__view;

    $output = ob_get_clean();

    return $output;
}

function addToCart() 
{
    if (array_key_exists("addToCart", $_POST)) {
        if (isset($_COOKIE[strval($_POST["addToCart"])])) {
            setcookie(strval($_POST["addToCart"]), ++$_COOKIE[strval($_POST["addToCart"])], 0, '/Toyoyo/');
        }
        else {
            setcookie(strval($_POST["addToCart"]), 1, 0, '/Toyoyo/');
        }
    }
}

function deleteFromCart() {
    if (array_key_exists("deleteFromCart", $_POST)) {
        if ($_COOKIE[strval($_POST["deleteFromCart"])] > 1) {
            setcookie(strval($_POST["deleteFromCart"]), --$_COOKIE[strval($_POST["deleteFromCart"])], 0, '/Toyoyo/');
        }
        else {
            setcookie(strval($_POST["deleteFromCart"]), NULL, time()-3600, '/Toyoyo/');
        }
    }
    else if (array_key_exists("deleteAllFromCart", $_POST)) {
        setcookie(strval($_POST["deleteAllFromCart"]), NULL, time()-3600, '/Toyoyo/');
    }
}

function deleteAllFromCart() {
    if (array_key_exists("deleteAllFromCart", $_POST)) {
        setcookie(strval($_POST["deleteAllFromCart"]), NULL, time()-3600, '/Toyoyo/');
    }
}

function calculateSummary($goods) {
    $totalAmount = 0;
    $totalGoods = 0;
    if (isset($_COOKIE)) {
        foreach ($_COOKIE as $id => $amount) {
            if (!is_numeric($id)) { continue; }
            if ($goods) {
                foreach ($goods as $item) {
                    if ($id == $item["id"]) {
                        $totalAmount += $item["price"]*$amount;
                        $totalGoods += $amount;
                        break;
                    }
                }
            }
        }
    }
    return array ($totalAmount, $totalGoods);
}

function loginCheck($users) {
    if (!empty($_POST)) {
        foreach ($users as $user) {
            if ($_POST["login"] == $user["login"]) {
                if (md5($_POST["password"]) == $user["password"]) {
                    return true;
                }
            }
        }
    }
    return false;
}

function newLoginCheck($users) {
    foreach ($users as $user) {
        if ($_POST["login"] == $user["login"]) {
            return false;
        }
    }
    return true;
}

function regexCheck() {
    enum Regex: string
    {
        case name = "/^([А-ЯЁ]{1}[а-яё]{2,})$/u";
        case login = "/^(?=.{5,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._-]+$/";
        case email = "/\w+@\w+\.\w+/";
        case password = "/^(?=^[a-zA-Z\d]{8,20}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/";
        case birthDate = "/^(0[1-9]|[12]\d|3[01])-(0[1-9]|1[0-2])-(19|20)(\d{2})$/";
        case phone = "/^(\+7) ?\([489]\d{2}\) ?\d{3} ?\d{4}$/";
        case site = "/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&\\=]*)/";
        case ip = "/^((25[0-5]|(2[0-4]|1\d|[1-9]|)\d)\.?\b){4}$/";        
    }

    if (!empty($_POST)) {
        foreach($_POST as $key => $value) {
            switch ($key) {
                case "firstName":
                    if(!preg_match(Regex::name->value, $value)) { 
                        return false;
                    }
                    break;
                case "lastName":
                    if(!preg_match(Regex::name->value, $value)) {
                        return false;
                    }
                    break;
                case "login":
                    if(!preg_match(Regex::login->value, $value)) {
                        return false;
                    }
                    break;
                case "email":
                    if(!preg_match(Regex::email->value, $value)) {
                        return false;
                    }
                    break;
                case "password":
                    if(!preg_match(Regex::password->value, $value)) {
                        return false;
                    }
                    break;
                case "birthDate":
                    if (!empty($value)) {
                        if(!preg_match(Regex::birthDate->value, $value)) {
                            return false;
                        }
                    }
                    break;
                case "phone":
                    if (!empty($value)) {
                        if(!preg_match(Regex::phone->value, $value)) {
                           return false;
                        }
                    }
                    break;
                case "site":
                    if (!empty($value)) {
                        if(!preg_match(Regex::site->value, $value)) {
                            return false;
                        }
                    }
                    break;
                case "ip":
                    if (!empty($value)) {
                        if(!preg_match(Regex::ip->value, $value)) {
                            return false;
                        }
                    }
                    break;
            }
        }
    }
    return true;
}
?>