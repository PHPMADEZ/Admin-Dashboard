<?php
if(isset($_POST["submit"]))
{
    // #variables
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];
    $invite = $_POST["invite"];
    // #include classes
    include "../classes/db.class.php";
    include "../classes/signup.class.php";
    include "../controllers/signup.cont.php";
    // #instance of signup class
    $signup = new SignupCont($uid, $pwd, $pwdRepeat, $email,$invite);
    // #signup user
    $signup->signupUser();
    // #redirect to main page if signup is successful
    header("location: /views/index.php?error=none");
}