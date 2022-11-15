<?php

class SignupCont extends Signup {

    //atributes
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;
    private $invite;

    public function __construct($uid, $pwd, $pwdRepeat, $email,$invite) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
        $this->invite = $invite;
    }
    /*
    -- Validates every aspect of signing up
    - @param $username - the username of the user
    - @param $email - the email of the user
    - @param $password - the password of the user
    - @param $passwordRepeat - the password of the user
    - @param $invite - the invite of the user
    */
    public function signupUser() {
        if($this->emptyInput() == false) {
            
            header("location: /views/index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false) {
           
            header("location: /views/index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            
            header("location: /views/index.php?error=email");
            exit();
        }
        if($this->pwdMatch() == false)
        {
            
            header("location: /views/index.php?error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false)
        {
            
            header("location: /views/index.php?error=useroremailtaken");
            exit();
        }
        if($this->checkInvite($this->invite) == false)
        {

            header("location: /views/index.php?error=invalidinvite");
            exit();
        }
       
        $this->setUser($this->uid, $this->pwd, $this->email);
        $this->deleteInvite($this->invite);
        
    }
    /*
    -- checks if the input is empty
    - @return true if the input is empty
    - @return false if the input is not empty
    */
    private function emptyInput() {
        $result;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    /*
    -- checks if the username is valid
    - @return true if the username is valid
    - @return false if the username is not valid
    */
    private function invalidUid() {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }
    /*
    -- checks if the email is valid
    - @return true if the email is valid
    - @return false if the email is not valid
    */
    private function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }
    /*
    -- checks if the password matches
    - @return true if the password matches
    - @return false if the password does not match
    */
    private function pwdMatch() {
        $result;
        if ($this->pwd !== $this->pwdRepeat) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }
    /*
    -- checks if the username is taken
    - @return true if the username is taken
    - @return false if the username is not taken
    */
    private function uidTakenCheck() {
        $result;
        if (!$this->checkUser($this->uid, $this->email)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }
    /* 
    -- makes a user, derived from admin panel
    - @param $username - the username of the user
    - @param $email - the email of the user
    - @param $password - the password of the user
    */
    public function setUserA($uid, $pwd, $email) {
        $this->setUserAdmin($uid, $pwd, $email);
    }

}