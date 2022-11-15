<?php
if(isset($_POST["submit"]))
{
    //#Variables
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    //#includes
    include "../classes/db.class.php";
    include "../classes/login.class.php";
    include "../controllers/login.cont.php";
    //#instance of login class
    $login = new LoginCont($uid, $pwd);
    //#login user
    $login->loginUser();
    //#redirect to main page if login is successful
    header("location: /pages/dashboard.php?error=none");
}