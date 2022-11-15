<?php
session_start();
if(!isset($_SESSION["useruid"]))
{
    header("location: /views/index.php?error=none");
    exit();
}
?>