<?php

include "./Model/UserModel.php";

class LoginController
{
    public $UserObject;

    public function __construct()
    {
        $this->UserObject= new User();
    }

    public function check()
    {
        if(isset($_POST['signin']))
        {
            $this->UserObject->login($_POST["Email"],sha1($_POST["Pass"]));
        }

    }
}
?>