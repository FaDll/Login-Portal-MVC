<?php
session_start();
include "./Model/UserModel.php";

class UserController
{
    public $UserObject;


    public function __construct()
    {
        $this->UserObject= new User();
    }

    public function check()
    {
        if(isset($_POST['signup']))
        {
            $this->GetFormData();
 
        $_SESSION["name"]=$_POST["name"];
        echo "<script>alert('thank you for sucessfull registration')</script>";
        echo "<script>setTimeout(\"location.href = './Home.php';\",5);</script>";
        }
    }


    public function GetFormData()
    {
        $this->UserObject->Name=$_POST["name"];
        $this->UserObject->Email=$_POST["email"];
        $this->UserObject->Password=$_POST["pass"];
        $this->UserObject->PhoneNumber=$_POST["PhoneNumber"];
        $this->UserObject->address=$_POST["address"];
        $this->UserObject->add($this->UserObject);

    }
    
}

?>