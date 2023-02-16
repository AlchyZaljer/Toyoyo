<?php
    require_once __DIR__ . '\..\includes\functions.php'; 
    require_once __DIR__ . '\..\includes\connect.php';
    require_once __DIR__ . '\..\includes\show.php';
    require_once __DIR__ . '\..\includes\add.php';
    
    $getParams = "";
    if (!empty($_POST)) {
        if (array_key_exists("firstName", $_POST) && array_key_exists("lastName", $_POST) && array_key_exists("login", $_POST) && array_key_exists("email", $_POST) && array_key_exists("password1", $_POST) && array_key_exists("password2", $_POST)) {
            $getParams .= "required=false&";
            if ($_POST["password1"] == $_POST["password2"]) {
                $getParams .= "passwords=false&";
                if (newLoginCheck(dbShow($connection, "users"))) {
                    $getParams .= "login=false&";
                    if (regexCheck()) {
                        $getParams = "";
                    } else {
                        $getParams .= "data=true";
                    }
                } else {
                    $getParams .= "login=true&";
                }
            } else {
                $getParams .= "passwords=true&";
            }
        } else {
            $getParams .= "required=true&";
        }
    }

    if (!empty($getParams)) {
        header("Location: ../signUp.php?$getParams");
    } else {
        $newUser = array( 
            "firstName" => $_POST["firstName"],
            "lastName" => $_POST["lastName"],
            "login" => $_POST["login"],
            "email" => $_POST["email"],
            "password" => md5($_POST["password1"]),
            "birthDate" => array_key_exists("birthDate", $_POST) ? $_POST["birthDate"] : NULL,
            "phone" => array_key_exists("birthDate", $_POST) ? $_POST["phone"] : NULL,
            "site" => array_key_exists("birthDate", $_POST) ? $_POST["site"] : NULL,
            "ip" => array_key_exists("birthDate", $_POST) ? $_POST["ip"] : NULL
        );
        
        if (dbInsert($connection, "users", $newUser)) {
            session_start(); 
            $_SESSION["login"] = $_POST["login"];
            header("Location: ../index.php");
        }
        else {
            echo "<p>Error while deleting from database</p>";
        }
    }

?>