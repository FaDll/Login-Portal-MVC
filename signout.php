<?php
session_start();
session_unset();

header("Location: LoginPortal.php");
?>