<?php
    require_once 'classes/user.php';

    $userObj = new User();

    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $userObj->login($username,$password);
    }
    elseif(isset($_POST["signup"]))
    {
        $firstname = $_POST["username"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $contact_number = $_POST["contact_number"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $userObj->signup($firstname,$lastname,$address,$contact_number,$username,$password);
    }
?>