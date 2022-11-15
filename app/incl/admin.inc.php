<?php
include "../classes/db.class.php";
include "../classes/admin.class.php";
include "../controllers/admin.cont.php";
include "../classes/utility.class.php";
include "../controllers/utility.cont.php";
include "../classes/signup.class.php";
include "../controllers/signup.cont.php";

/*
# looks at response from dropdownlist
 @param $response - the response from the list
*/
if(isset($_POST['submit'])){

    if(!empty($_POST['actions'])) {
        $selected = $_POST['actions'];
        if($selected == 'delete'){
            $uid = $_GET['id'];
            // Instance of admin class
            $admin = new AdminCont();
            // Delete user
            $delete = $admin->deleteUser($uid);
            // If user is deleted successfully then redirect to admin page
            header("location: /pages/user.php?error=none");
            exit();
        }
        else if ($selected == "geninv")
        {
            $uid = $_GET['id'];
            // Includes
            // Instance of utility class
            $utility = new utilityCont($uid);
            $gen_invite = $utility->generateInvite();
            // If invite is generated successfully then redirect to admin page
            header("location: /pages/user.php?error=notenoughtokens");
            exit();
        }
        elseif ( $selected == "gentoken") {
            $uid = $_GET['id'];
            $admin = new AdminCont();
            $gen_token = $admin->addToken($uid);
            header("location: /pages/user.php?error=none");
            exit();

        }
     
    } 
}
/*
# addWeek functions adds a week onto ALL users subscriptions
@param $uid - the user id
*/
if (isset($_POST['addWeek']))
{
    session_start();
    $uid = $_SESSION['useruid'];
    // Instance of admin class
    $admin = new AdminCont();
    $utility = new UtilityCont($uid);
    // Add week
    $add_week = $admin->updateWeek();
    $utility->insertNotification($uid, "added 1 week to all subs");
    // If week is added successfully then redirect to admin page
    header("location: /pages/dashboard.php?error=none");
    exit();
}
/*
# addDay functions adds a day onto ALL users subscriptions
 @param $uid - the user id
*/
if (isset($_POST['addDay'])) {
    session_start();
    $uid = $_SESSION['useruid'];
    // Instance of admin class
    $admin = new AdminCont();
    $utility = new UtilityCont($uid);
    // Add day
    $add_day = $admin->updateDay();
    $utility->insertNotification($uid, "added 1 day to all subs");
    // If day is added successfully then redirect to admin page
    header("location: /pages/dashboard.php?error=none");
    exit();
}
/*
# randomize function, this will give random users invite tokens
 @param $uid - the user id
*/
if (isset($_POST['randomize'])) {
    session_start();
    $uid = $_SESSION['useruid'];
    // Instance of admin class
    $utility = new utilityCont($uid);
    // Randomize users
    $randomize = $utility->randomizeUsers();
    $utility->makeNotification($uid, "generated random invites at");
    // If users are randomized successfully then redirect to admin page
    header("location: /pages/dashboard.php?error=none");
    exit();
}
/*
# admin create function to create users
 @param $uid - the user id
*/
if (isset($_POST['aCreate']))
{
    //variables
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = "";
    $email = $_POST["email"];
    $invite = "";
    //instance of signup class
    $signup = new SignupCont($uid, $pwd, $pwdRepeat, $email,$invite);
    //signup user
    $signup = $signup->setUserAdmin($uid, $pwd, $email);
    //redirect to main page if signup is successful
    header("location: /pages/dashboard.php?error=none");
}
/*
# generates an invite
 @param $uid - the user id
*/
if (isset($_POST['ugeninv']))
{
    $uid = $_GET['id'];
    // Instance of utility class
    $utility = new utilityCont($uid);
    // Generate invite
    $count = $utility->showTokens();
    if ($count > 0)
    {
        $gen_invite = $utility->generateInvite();
        
    }
    // If invite is generated successfully then redirect to admin page
    header("location: /pages/invites.php?error=notenoughtokens");
    exit();
}
/*
# Make website status ud
@param status - the status of the website
*/
if (isset($_POST['webud']))
{
    $uid = '';
    $status = 'undetected';
    // Instance of utility class
    $utility = new utilityCont($uid);
    $webud = $utility->updateWebsiteStatus($status);
    header("location: /pages/dashboard.php?error=none");
}
/*
# Make website status updating
*/
if (isset($_POST['webup']))
{
    $uid = '';
    $status = 'updating';
    // Instance of utility class
    $utility = new utilityCont($uid);
    $webup = $utility->updateWebsiteStatus($status);
    header("location: /pages/dashboard.php?error=none");
}
/*
# Make website status detected
*/
if (isset($_POST['webd']))
{
    $uid = '';
    $status = 'detected';
    // Instance of utility class
    $utility = new utilityCont($uid);
    $webd = $utility->updateWebsiteStatus($status);
    header("location: /pages/dashboard.php?error=none");
}
/*
# make loader status undetected
*/
if (isset($_POST['loadud']))
{
    $uid = '';
    $status = 'undetected';
    // Instance of utility class
    $utility = new utilityCont($uid);
    $loadud = $utility->updateLoaderStatus($status);
    header("location: /pages/dashboard.php?error=none");
}
/*
# make loader status updating
*/
if (isset($_POST['loadup']))
{
    $uid = '';
    $status = 'updating';
    // Instance of utility class
    $utility = new utilityCont($uid);
    $loadup = $utility->updateLoaderStatus($status);
    header("location: /pages/dashboard.php?error=none");
}
/*
# make loader status detected
*/
if (isset($_POST['loadd']))
{
    $uid = '';
    $status = 'detected';
    // Instance of utility class
    $utility = new utilityCont($uid);
    $loadd = $utility->updateLoaderStatus($status);
    header("location: /pages/dashboard.php?error=none");
}
/*
# make cheat status undetected
*/
if (isset($_POST['cheatud']))
{
    $uid = '';
    $status = 'undetected';
    // Instance of utility class
    $utility = new utilityCont($uid);
    $cheatud = $utility->updateCheatStatus($status);
    header("location: /pages/dashboard.php?error=none");
}
/*
# make cheat status updating
*/
if (isset($_POST['cheatup']))
{
    $uid = '';
    $status = 'updating';
    // Instance of utility class
    $utility = new utilityCont($uid);
    $cheatup = $utility->updateCheatStatus($status);
    header("location: /pages/dashboard.php?error=none");
}
/*
# make cheat status detected
*/
if (isset($_POST['cheatd']))
{
    $uid = '';
    $status = 'detected';
    // Instance of utility class
    $utility = new utilityCont($uid);
    $cheatd = $utility->updateCheatStatus($status);
    header("location: /pages/dashboard.php?error=none");
}

if (isset($_POST['aUser']))
{
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    
    $admin = new AdminCont();
    $admin->addAsAdmin($uid, $pwd, $email);

    header("location: /pages/dashboard.php?error=none");
}

//insert reason
if (isset($_POST['insertReason']))
{
    $user = $_GET['id'];
    $reason = $_POST['rr'];
    $utility = new utilityCont($user);
    $utility->insertReason($reason, $user);
    header("location: /pages/settings.php?error=none");
}



if (isset($_POST['uuimg'])) { 
    
    $admin = new AdminCont();
    
    $id = $_GET['id'];

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg');

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {

            if ($fileSize < 1000000) {

            $fileNameNew = "profile" . $id . "." . $fileActualExt;

            $fileDestination = '../uploads/' . $fileNameNew;

            move_uploaded_file($fileTmpName, $fileDestination);

            $profile = $admin->updateProfile($id);

            header("Location: index.php?upload=success");
        }
        else {
            echo "Your file is too big!";
        }
        }
        else {
        echo "There was an error uploading your file!";
        }
    } 
    else {
        echo "You cannot upload files of this type!";
    }

}




