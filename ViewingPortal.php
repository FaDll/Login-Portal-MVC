<?php
include "View/UserView.php";
include "Controller/UserController.php";
$controller= new UserController();
$controller->check();
?>