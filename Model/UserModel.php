<?php
session_start();

include './DatabaseFile/Database.php';


Class User
{   
    public $id;
    public $Name;
    public $Email;
    public $Password;
    public $PhoneNumber;
    public $address;
    public $DbObj;


    public static function add($obj)
    {
        $fields=array("id","name","email","password","phoneNumber","address");
        $pw=sha1($obj->Password);
        $values=array($obj->id,$obj->Name,$obj->Email,$pw,$obj->PhoneNumber,$obj->address);
        $DBobj=Database::getInstance();
        $DBobj->insert("users",$fields,$values);

    }

    public static function DisplayData($email)
    {
        $DbObj=Database::getinstance();
        $result=$DbObj->selectWhere("users","where email=".$email."");
        if($result != NULL)
        {
            $row = mysqli_fetch_array($result);
            $name=$row['name'];
            return $name;
        }
    }

    public static function login($email,$password)
    {
        $DbObj=Database::getinstance();
        $result = $DbObj->selectWhere("users", "email = '".$email."' and password = '".$password."'");

        if($result != NULL)
        {
            $row = mysqli_fetch_array($result);
            $_SESSION["name"]=$row['name'];
            header("Location: ./Home.php");
        }
        else
            include "AlertModel.html";
    }
}

?>