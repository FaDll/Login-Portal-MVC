<?php
include "View/LoginView.php";
include "Controller/LoginController.php";
$controller= new LoginController();
$controller->check();
?>